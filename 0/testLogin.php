<?php
    session_start();

    //print_r($_REQUEST);
    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))  
    {
        //acessa o BD
        include_once('connection.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        /*
        print_r('Email: ' . $email . '<br>');
        print_r('Senha: ' . $senha);
        */

        $sql = "SELECT * FROM tbl_usuario WHERE usu_email = '$email' and usu_senha = '$senha'";

        $result = $conn->query($sql);

        print_r($sql . '<br>');
        print_r($result);
        print_r('<br>' . '<br>');

        if (mysqli_num_rows($result) < 1) 
        {
            //print_r('Usuário ou senha inválidos. Digite novamente');

            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            //print_r('Agradecemos por se cadastrar');

            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: home.php');
        }
    }
    else
    {
        //não acessa
        header('Location: login.php');
    }
?>