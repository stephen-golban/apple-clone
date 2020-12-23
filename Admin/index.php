<?php
include_once '../Processes/logged.php';
include_once '../includes/db.php';

$getUsers = mysqli_query($conn, "SELECT * FROM users");
$getProducts = mysqli_query($conn, "SELECT * FROM products");
$getCategory = mysqli_query($conn, "SELECT * FROM categories");

if (!logged()) {
    header("Location: ../Login/index.php");
    exit();
}
if (isset($_SESSION['data'])) {
    $uid = $_SESSION['data']['id'];
    $getProds = mysqli_query($conn, "SELECT * FROM bag WHERE user_id = '$uid'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head.inc.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple — Admin / Dashboard page</title>
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
                    <a class="nav-link active" href="index.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Add Products</a>
                </li>
                <?php foreach ($getCategory as $categ) { ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="Products/index.php?categName=<?php echo $categ['category_name']; ?>"><?php echo $categ['category_name']; ?></a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" tabindex="-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Bag/index.php">Bag <span class="text-primary"><?php echo mysqli_num_rows($getProds); ?></span></a>
                        <a class="dropdown-item" href="index.php">Admin</a>
                        <div class="dropdown-divider"></div>
                        <form action="../Processes/logout.php" method="POST">
                            <button class="dropdown-item" type="submit">Log Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->
    <?php if (isset($_GET['action-success'])) : ?>
        <p class="alert alert-success">Action has been successfully done!</p>
    <?php endif; ?>
    <?php if (isset($_GET['action-failed'])) : ?>
        <p class="alert alert-danger">Action could not be completed!</p>
    <?php endif; ?>
    <div class="container">
        <h1 class="display-4" style="text-align: center; padding: 20px 0;">USERS TABLE</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">IS Admin</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getUsers as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php if ($row['is_admin'] == 1) {
                                echo "ADMIN";
                            } else {
                                echo "Not Admin";
                            } ?></td>
                        <td>
                            <form action="functions.php" method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-outline-danger" name="user-delete-submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h1 class="display-4" style="text-align: center; padding: 20px 0;">PRODUCTS TABLE</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Specification</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getProducts as $row) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['prod_id']; ?></th>
                        <td><?php echo $row['prod_name']; ?></td>
                        <td><img src="<?php echo $row['prod_image']; ?>" width="50px" alt="prod_img"></td>
                        <td><?php echo $row['prod_desc']; ?></td>
                        <td><?php echo $row['prod_spec']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['categ']; ?></td>
                        <td>
                            <form action="functions.php" method="POST">
                                <input type="hidden" name="prod_id" value="<?php echo $row['prod_id']; ?>">
                                <button type="submit" class="btn btn-outline-danger" name="product-delete-submit">Delete</button>
                            </form>
                            <br>
                            <a href="update.php?updateProdID=<?php echo $row['prod_id']; ?>" class="btn btn-outline-info">Update</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>