<?php
    session_start();
    //print_r($_SESSION);

    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA | GN</title>

    <!--online link-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--link style.css-->
    

    <!--CSS-->
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:blue;">
        <div class="navbar-brand" style="color: white; margin: 25px; font-size: 30px; font-weight:bold">SISTEMA DO GN</div>

        <div class="d-flex" style="margin-left: 70%;">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <?php
        echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
</body>
</html>