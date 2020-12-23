<?php
include_once '../includes/db.php';

$getCategories = mysqli_query($conn, "SELECT * FROM categories");
if (isset($_GET['updateProdID'])) {
    $id = $_GET['updateProdID'];
    $getProduct = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE prod_id = '$id'"));
}
if (isset($_POST['product-update-submit']) && isset($_GET['updateProdID'])) {
    $pid = $_GET['updateProdID'];
    $pName = $_POST['product_name'];
    $pImage = $_POST['product_image'];
    $pDescription = $_POST['product_desc'];
    $pSpecification = $_POST['product_spec'];
    $pPrice = $_POST['product_price'];
    $pCategory = $_POST['category'];

    $sql = "UPDATE products SET prod_name = '$pName', prod_image = '$pImage', prod_desc = '$pDescription', prod_spec = '$pSpecification' , price = '$pPrice' , categ = '$pCategory' WHERE prod_id = '$pid'";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        header("Location: index.php?action-success");
        exit();
    } else {
        if (isset($_GET['updateProdID'])) {
            header("Location: update.php?updateProdID=" . $getProduct['prod_id'] . "&action-failed");
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head.inc.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple — Admin / Product Update page</title>
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
                    <a class="nav-link" href="add.php">Add Products</a>
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
    <?php if (isset($_GET['action-failed'])) : ?>
        <p class="alert alert-danger">Product could not be updated!</p>
    <?php endif; ?>
    <div class="container">
        <h1 class="display-4" style="text-align: center; padding: 20px 0;">Apple Products - Update</h1>
        <form action="update.php?updateProdID=<?php if (isset($_GET['updateProdID'])) {
                                                    echo $_GET['updateProdID'];
                                                } ?>" method="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required value="<?php if (isset($_GET['updateProdID'])) {
                                                                                                                                                echo $getProduct['prod_name'];
                                                                                                                                            } ?>">
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="text" class="form-control" id="product_image" name="product_image" placeholder="Product Image Link" required value="<?php if (isset($_GET['updateProdID'])) {
                                                                                                                                                        echo $getProduct['prod_image'];
                                                                                                                                                    } ?>">
            </div>
            <div class="form-group">
                <label for="product_desc">Product Description</label>
                <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Product Description" required value="<?php if (isset($_GET['updateProdID'])) {
                                                                                                                                                    echo $getProduct['prod_desc'];
                                                                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label for="product_spec">Product Specificatations</label>
                <input type="text" class="form-control" id="product_spec" name="product_spec" placeholder="Product Specifications" required value="<?php if (isset($_GET['updateProdID'])) {
                                                                                                                                                        echo $getProduct['prod_spec'];
                                                                                                                                                    } ?>">
            </div>
            <div class="form-group">
                <label for="product_price">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price" required value="<?php if (isset($_GET['updateProdID'])) {
                                                                                                                                                echo $getProduct['price'];
                                                                                                                                            } ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Product Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category" required>
                    <option><?php if (isset($_GET['updateProdID'])) {
                                echo $getProduct['categ'];
                            } ?></option>
                    <?php foreach ($getCategories as $row) { ?>
                        <option><?php echo $row['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-info" name="product-update-submit">Update Product</button>
        </form>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>