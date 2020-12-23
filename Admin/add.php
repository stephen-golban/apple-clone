<?php
include_once '../Processes/logged.php';
include_once '../includes/db.php';

$getCategories = mysqli_query($conn, "SELECT * FROM categories");

if (!logged()) {
    header("Location: ../Login/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head.inc.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple — Admin / Product ADD page</title>
    <link rel="stylesheet" href="../main.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="../index.php"><i class="fab fa-apple"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add.php">Add Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">iPhone</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Watch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">TV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Music</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Support</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" tabindex="-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="#">Action</a>
                        <a class="dropdown-item disabled" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <form action="Processes/logout.php" method="POST">
                            <button class="dropdown-item" type="submit" href="../Processes/logout.php">Log Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->
    <?php if (isset($_GET['add-success'])) : ?>
        <p class="alert alert-success">Product has been successfully added into the database!</p>
    <?php endif; ?>
    <?php if (isset($_GET['add-failed'])) : ?>
        <p class="alert alert-danger">Product could not be added into the database!</p>
    <?php endif; ?>
    <div class="container">
        <h1 class="display-4" style="text-align: center; padding: 20px 0;">Apple Products - Add</h1>
        <form action="functions.php" method="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="text" class="form-control" id="product_image" name="product_image" placeholder="Product Image Link" required>
            </div>
            <div class="form-group">
                <label for="product_desc">Product Description</label>
                <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Product Description" required>
            </div>
            <div class="form-group">
                <label for="product_spec">Product Specificatations</label>
                <input type="text" class="form-control" id="product_spec" name="product_spec" placeholder="Product Specifications" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Product Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                    <?php foreach ($getCategories as $row) { ?>
                        <option><?php echo $row['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-info" name="product-add-submit">Add Product</button>
        </form>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>