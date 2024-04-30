<?php
require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <link rel="stylesheet" href="header.css">
</head>
<body>
    <header>
        <h1><a href="home.php"><img style="width: 50px; height: 40px;" src="assets/img/1301855.jpg" alt=""></a></h1>
        <div class="main_tabs">
            <a href="upload.php">Upload</a>
            <a href="home.php">Products</a>
        </div>
        <a href="cart.php">Cart <span id="badge"><?php echo mysqli_num_rows($all_cart); ?></span></a>
    </header>
</body>
</html>