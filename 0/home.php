<?php
require_once 'connection.php';

$sql = "SELECT * FROM product";
$all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="home.css">
</head>

<body>
    <?php
    include_once '0header.php';
    ?>

    <main>
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $row["product_image"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                    <p class="product_name">
                        <?php echo $row["product_name"]; ?>
                    </p>
                    <p class="price">Preço: R$:
                        <?php echo number_format($row["price"], 2, ",", "."); ?>
                    </p>
                    <p class="discount">
                        Desconto: R$:
                        <b>
                            <del>
                                <?php echo number_format($row["discount"], 2, ",", "."); ?>
                            </del>
                        </b>
                    </p>
                </div>
                <div class="botao">
                    <button class="add" data-id="<?php echo $row["product_id"]; ?>">Add to cart</button>
                </div>
            </div>
            <?php
        }
        ?>
    </main>
    <script>
        var product_id = document.getElementsByClassName("add");
        for (var i = 0; i < product_id.length; i++) {
            product_id[i].addEventListener("click", function (event) {
                var target = event.target;
                var id = target.getAttribute("data-id");
                var xml = new XMLHttpRequest();
                xml.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        target.innerHTML = data.in_cart;
                        document.getElementById("badge").innerHTML = data.num_cart + 1;
                        //alert(this.responseText);
                    }
                }

                xml.open("GET", "connection.php?id=" + id, true);
                xml.send();
            })
        }
    </script>
</body>

</html>