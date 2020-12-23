<?php
include_once '../Processes/logged.php';
include_once '../includes/db.php';
$getCategory = mysqli_query($conn, "SELECT * FROM categories");
if (isset($_SESSION['data'])) {
    $uid = $_SESSION['data']['id'];
    $getProducts = mysqli_query($conn, "SELECT * FROM bag WHERE user_id = '$uid'");
    $getSum = mysqli_query($conn, "SELECT SUM(price) as prod_price FROM bag WHERE user_id = '$uid'");
}
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
    <title>Apple - Bag</title>
    <link rel="stylesheet" href="../Products/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="../index.php"><i class="fab fa-apple"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <?php foreach ($getCategory as $categ) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Products/index.php?categName=<?php echo $categ['category_name']; ?>"><?php echo $categ['category_name']; ?></a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" tabindex="-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php">Bag <span class="text-primary"><?php echo mysqli_num_rows($getProducts); ?></span></a>
                        <?php if (admin()) : ?>
                            <a class="dropdown-item" href="../Admin/index.php">Admin</a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <form action="../Processes/logout.php" method="POST">
                            <button class="dropdown-item" type="submit">Log Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <h1 class="display-4">Your total : <b>$<?php foreach ($getSum as $sum) {
                                                echo $sum['prod_price'];
                                            } ?></b></h1>
    <div class="products__showcase">
        <?php
        foreach ($getProducts as $row) {
            $pid = $row['prod_id'];
            $res = mysqli_query($conn, "SELECT * FROM products WHERE prod_id = '$pid'");
            if (mysqli_num_rows($res) > 0) {
                foreach ($res as $val) { ?>
                    <div class="product">
                        <img src="<?php echo $val['prod_image']; ?>" alt="img">
                        <p class="h3"><?php echo $val['prod_name']; ?></p>
                        <p class="h4"><?php echo "$" . $val['price']; ?></p>
                        <p class="lead text-secondary"><?php echo $val['prod_spec']; ?></p>
                        <form action="../Processes/delete.php" method="POST">
                            <input type="hidden" name="prod_id" value="<?php echo $val['prod_id']; ?>">
                            <button type="submit" class="btn btn-outline-danger" name="delete-from-bag" style="width: 100%;">Remove</button>
                        </form>
                    </div>
        <?php }
            }
        } ?>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>