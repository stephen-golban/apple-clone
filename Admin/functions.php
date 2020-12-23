<?php
include_once '../includes/db.php';

if (isset($_POST['user-delete-submit'])) {
    $uid = $_POST['user_id'];
    $exec = mysqli_query($conn, "DELETE FROM users WHERE id = '$uid'");
    if ($exec) {
        header("Location: index.php?action-success");
        exit();
    } else {
        header("Location: index.php?action-failed");
        exit();
    }
}
if (isset($_POST['product-delete-submit'])) {
    $pid = $_POST['prod_id'];
    $exec = mysqli_query($conn, "DELETE FROM products WHERE prod_id = '$pid'");
    if ($exec) {
        header("Location: index.php?action-success");
        exit();
    } else {
        header("Location: index.php?action-failed");
        exit();
    }
}
if (isset($_POST['product-add-submit'])) {
    $prodName = $_POST['product_name'];
    $prodImage = $_POST['product_image'];
    $prodDescription = $_POST['product_desc'];
    $prodSpecification = $_POST['product_spec'];
    $prodPrice = $_POST['product_price'];
    $prodCategory = $_POST['category'];


    $sql = "INSERT INTO products(prod_name,prod_image,prod_desc,prod_spec,price,categ) VALUES ('$prodName', '$prodImage', '$prodDescription', '$prodSpecification', '$prodPrice', '$prodCategory')";
    $exec = mysqli_query($conn, $sql);
    if ($exec) {
        header("Location: add.php?add-success");
        exit();
    } else {
        header("Location: add.php?add-failed");
        exit();
    }
}
