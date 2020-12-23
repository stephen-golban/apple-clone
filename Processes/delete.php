<?php
session_start();
include_once '../includes/db.php';

if (isset($_POST['delete-from-bag']) && isset($_SESSION['data'])) {
    $pid = $_POST['prod_id'];
    $uid = $_SESSION['data']['id'];
    $execute = mysqli_query($conn, "DELETE FROM bag WHERE `prod_id` = '$pid' AND `user_id` = '$uid'");

    header("Location: ../Bag/index.php");
    exit();
}
