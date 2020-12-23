<?php
session_start();
include_once '../includes/db.php';

if (isset($_POST['add-to-bag']) && isset($_SESSION['data'])) {
    $uid = $_SESSION['data']['id'];
    $pid = $_POST['prod_id'];
    $pprice = $_POST['prod_price'];
    $urlPath = $_POST['prod_price'];

    $sql = "INSERT INTO bag(prod_id,user_id,price) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $pid, $uid, $pprice);
        mysqli_stmt_execute($stmt);
        header("Location: " . $_SESSION['redirectTo']);
    }
}
