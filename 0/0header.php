<?php
session_start();
//print_r($_SESSION);

if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) 
{
    $logado = $_SESSION['email'];
}else{
    $logado = 0;
}

require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Navbar Design</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="0header_style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="main-navbar shadow-sm sticky-top">
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                            <a class="navbar-brand text-white" href="consulta.php"
                                style="font-family: 'Young Serif', serif; font-size: 25px;">
                                <img src="assets/LucasArts.png" width="100%" class="d-inline-block align-top" alt="">
                            </a>
                        </div>
                        <div class="col-md-5 my-auto">
                            <form role="search">
                                <div class="input-group">
                                    <input type="search" placeholder="Search your product" class="form-control" />
                                    <button class="btn bg-white" style="width: 50px; height:38px" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 my-auto">
                            <ul class="nav justify-content-end">
                                <?php if ($logado) {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cart.php">
                                            <i class="fa fa-shopping-cart"></i> Cart (<span id="badge" style="color:aqua;">
                                                <?php echo mysqli_num_rows($all_cart); ?>
                                            </span>)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-heart"></i> Wishlist (0)
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i>
                                            <?php echo "$logado"; ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My
                                                    Wishlist</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My
                                                    Cart</a></li>
                                            <li><a class="dropdown-item" href="sair.php"><i class="fa fa-sign-out"></i>
                                                    Logout</a>
                                            </li>
                                            <li><a class="dropdown-item" href="upload.php"><i class="fa fa-list"
                                                        style="color:brown"></i>
                                                    <spam style="color:brown">Registrar</spam>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cart.php">
                                            <i class="fa fa-shopping-cart"></i> Cart (<span id="badge" style="color:aqua;">
                                                <?php echo mysqli_num_rows($all_cart); ?>
                                            </span>)
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-heart"></i> Wishlist (0)
                                        </a>
                                    </li>
                                    <a href="login.php"><button></i>LOGIN</button></a>
                                    <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                        Funda Ecom
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="upload.php">Upload</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Featured Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Electronics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fashions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Accessories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Appliances</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>