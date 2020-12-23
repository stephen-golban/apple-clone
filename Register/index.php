<?php
include_once '../Processes/logged.php';
if (logged()) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../includes/head.inc.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up — Create your account - Apple</title>
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
                    <a class="nav-link disabled" href="#">Mac</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">iPad</a>
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
                        <a class="dropdown-item" href="../Login/index.php">Sign In</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <div class="container" style=" padding: 200px">
        <form action="../Processes/register.php" method="POST">
            <div class="form-group">
                <label for="exampleUname">Username</label>
                <input type="text" class="form-control" id="exampleUname" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="form-group">
                <label for="exampleRepeat">Repeat-Password</label>
                <input type="password" class="form-control" id="exampleRepeat" name="repeat-password">
            </div>
            <button type="submit" class="btn btn-outline-dark" name="register-submit">Register</button>
        </form>
        <br>
        <?php if (isset($_GET['error'])) : ?>
            <p class="alert alert-danger">
                <?php
                if ($_GET['error'] == "empty") {
                    echo "Please fill in all the fields!";
                } else if ($_GET['error'] == "match") {
                    echo "Your passwords do not match!";
                } else if ($_GET['error'] == "conn") {
                    echo "Something went wrong!";
                } else if ($_GET['error'] == "exist") {
                    echo "This e-mail already exists!";
                }

                ?>
            </p>
        <?php endif; ?>
        Already have an Apple Account? <a href="../Login/index.php">Sign In Now.</a>
    </div>
    <?php include_once '../includes/footer.inc.php'; ?>
</body>

</html>