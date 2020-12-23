<?php
session_start();
if (isset($_SESSION['data'])) {
    header("../index.php");
}
if (isset($_POST['login-submit'])) {
    require_once '../includes/db.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../Login/index.php?error=empty&email=" . $email);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../Login/index.php?error=conn&email=" . $email);
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($res)) {
                $pwdCheck = password_verify($password, $row['pass']);
                if ($pwdCheck === false) {
                    header("Location: ../Login/index.php?error=incorrect&email=" . $email);
                    exit();
                } else {
                    $_SESSION['data'] = $row;
                    header("Location: ../index.php");
                    exit();
                }
            } else {
                header("Location: ../Login/index.php?error=notRegistered&email=" . $email);
                exit();
            }
        }
    }
}
