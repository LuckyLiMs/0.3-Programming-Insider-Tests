<?php
require_once 'connection.php';

if (isset($_POST['submit'])) {
    //site host alert echo "<script>alert('submitted')</script>";

    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    //for uploads photos
    $upload_dir = "uploads/"; //this is where the uploaded photo stored
    $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_dir . $_FILES["imageUpload"]["name"];
    $upload_file = $upload_dir . basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION)); //used to detect the image format  
    $check = $_FILES["imageUpload"]["size"]; //detect the size of the image
    $upload_ok = 0;

    if (file_exists($upload_file)) {
        echo "<script>alert('the file already exists')</script>";
        $upload_ok = 0;
    } else {
        $upload_ok = 1;
        if ($check !== false) {
            $upload_ok = 1;
            if($imageType == "jpg" || $imageType == "jpeg" || $imageType == "png"){
                $upload_ok = 1;
            }else{
                echo "<script>alert('image format not suported')</script>";
            }
        } else {
            echo "<script>alert('The file size is 0 please change the file')</script>";
            $upload_ok = 0;
        }
    }

    if ($upload_ok == 0) {
        echo "<script>alert('file not uploaded. Please try again')</script>";
    }else{
        if($productname != "" && $price !=""){
            move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $upload_file);

            $sql = "INSERT INTO product(product_name, price, discount, product_image) VALUES('$productname','$price','$discount','$product_image')";

            if($conn->query($sql) === TRUE){
                echo "<script>alert('product uploaded successfully')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="upload.css">
</head>

<body>
    <?php
    include_once("0header.php");
    ?>
    <section id="upload_container">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="number" name="discount" id="discount" placeholder="Product Discount" required>
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var discount = document.getElementById("discount");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload() {
            uploadImage.click();
        }

        uploadImage.addEventListener("change", function () {
            var file = this.files[0];
            if (productname.value == "") {
                productname.value = file.name;
            }
            choose.innerHTML = "You can change(" + file.name + ") picture";
        })
    </script>
</body>

</html>