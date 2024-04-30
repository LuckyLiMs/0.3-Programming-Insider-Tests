<?php
//conexão PDO
try {
    $conn = new PDO("mysql:dbname=ecommerce;host=localhost","root","123456");
} catch (PDOException $e) {
    echo "Erro com banco de dados". $e->getMessage();
}
catch(Exception $e) {
    echo "Erro generico". $e->getMessage();
}



if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $sql = $conn->query("SELECT * FROM cart WHERE product_id = '$product_id'");
    $result = $conn->query($sql);
    $total_cart = $conn->query("SELECT * FROM cart");
    $total_cart_result = $conn->query($total_cart);
    $cart_num = $conn->query("SELECT FOUND_ROWS($total_cart)");

    if($conn->prepare("SELECT FOUND_ROWS($result)") > 0){
        $in_cart = "already in cart";
    }else{
        $insert = $conn->query("INSERT INTO cart(product_id) VALUES('$product_id')");
        if($conn->query($insert) === true){
            $in_cart = "added into cart";
        }else{
            echo "<script>alert('not insert')</script>";
        }
    }
    //echo "this the message from connection.php......product id is $product_id";
}

if(isset($_GET["cart_id"])){
    $product_id = $_GET["cart_id"];
    $del = $conn->query("DELETE FROM cart WHERE product_id=".$product_id);
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=cart.php"/>';

    if($conn->query($sql) === TRUE){
        echo "Removed from cart";
    }
}
?>