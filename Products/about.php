<?php
include_once '../Processes/logged.php';
include_once '../includes/db.php';

$getCategory = mysqli_query($conn, "SELECT * FROM categories");
if (isset($_GET['prodID'])) {
    $q = $_GET['prodID'];
    $getProds = mysqli_query($conn, "SELECT * FROM products WHERE prod_id = '$q'");
}
if (isset($_SESSION['data'])) {
    $uid = $_SESSION['data']['id'];
    $getProducts = mysqli_query($conn, "SELECT * FROM bag WHERE user_id = '$uid'");
}
if (!logged()) {
    header("Location: ../Login/index.php");
    exit();
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];
$_SESSION['redirectTo'] = $url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head.inc.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple - <?php foreach ($getProds as $a) {
                        echo $a['prod_name'];
                    } ?></title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php"><i class="fab fa-apple"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <?php foreach ($getCategory as $categ) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?categName=<?php echo $categ['category_name']; ?>"><?php echo $categ['category_name']; ?></a>
                    </li>
                <?php } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" tabindex="-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-bag"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../Bag/index.php">Bag <span class="text-primary"><?php echo mysqli_num_rows($getProducts); ?></span></a>
                        <?php if (admin()) : ?>
                            <a class="dropdown-item" href="Admin/index.php">Admin</a>
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

    <div class="container">
        <?php if (mysqli_num_rows($getProds) > 0) {
            foreach ($getProds as $val) { ?>
                <div class="product">
                    <div class="left">
                        <img src="<?php echo $val['prod_image']; ?>" alt="img">
                    </div>
                    <div class="right">
                        <p class="h3"><?php echo $val['prod_name']; ?></p>
                        <p class="h4"><?php echo "$" . $val['price']; ?></p>
                        <p class="lead text-secondary"><?php echo $val['prod_spec']; ?></p>
                        <p class="lead text-secondary"><?php echo $val['prod_desc']; ?></p>
                        <form action="../Processes/addToBag.php" method="POST">
                            <input type="hidden" name="prod_id" value="<?php echo $val['prod_id']; ?>">
                            <input type="hidden" name="prod_price" value="<?php echo $val['price']; ?>">
                            <input type="hidden" name="path" value="<?php echo $url; ?>">
                            <button type="submit" class="btn btn-outline-primary" name="add-to-bag" style="width: 100%;">Buy</button>
                        </form>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>