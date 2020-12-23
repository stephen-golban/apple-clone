<?php

if (isset($_POST['register-submit'])) {
    require_once '../includes/db.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat-password'];

    if (empty($username) || empty($email) || empty($password) || empty($repeatPassword)) {
        header("Location: ../Register/index.php?error=empty&uname=" . $username . "&email=" . $email);
        exit();
    } else if ($password !== $repeatPassword) {
        header("Location: ../Register/index.php?error=match&uname=" . $username . "&email=" . $email);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Register/index.php?error=conn&uname=" . $username . "&email=" . $email);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_store_result($stmt);
            $res = mysqli_stmt_num_rows($stmt);
            if ($res > 0) {
                header("Location: ../Register/index.php?error=exist&uname=" . $username . "&email=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users(uname,email,pass) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../Register/index.php?error=conn&uname=" . $username . "&email=" . $email);
                    exit();
                } else {
                    $hashPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Login/index.php?email=" . $email);
                    exit();
                }
            }
        }
    }
}
