<?php
    if (isset($_POST['submit'])) 
    {

        // DATA VERIFICATION MESSAGE 

        /*
        print_r('Nome: ' . $_POST['nome']);
        print_r('<br>');
        print_r('Email: ' . $_POST['email']);
        print_r('<br>');
        print_r('Telefone: ' . $_POST['telefone']);
        print_r('<br>');
        print_r('Sexo: ' . $_POST['genero']);
        print_r('<br>');
        print_r('Data de Nascimento: ' . $_POST['data_nascimento']);
        print_r('<br>');
        print_r('Cidade: ' . $_POST['cidade']);
        print_r('<br>');
        print_r('Estado: ' . $_POST['estado']);
        print_r('<br>');
        print_r('Endereço: ' . $_POST['endereco']);
        */


        // LINKING CONECTION FILE

        include_once('conexao.php');

        // REFERENCING NAMES AND VARIABLES

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        // EXECUTING SQL QUERYS

        $result = $conn->query( 
            "INSERT INTO 
            tbl_usuario(usu_nome, usu_email, usu_senha, usu_telefone, usu_sexo, usu_dataNasc, usu_cidade, usu_estado, usu_endereco) 
            VALUES 
            ('$nome', '$email', '$senha', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>

    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="post">
            <fieldset>
                <legend> <b> Formulário de Clientes </b> </legend>
                <br>

                <!--Nome-->
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput"> Nome completo </label>
                </div>
                <br><br>
                <!--Email-->
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput"> Email </label>
                </div>
                <br><br>
                <!--Senha-->
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput"> Insira uma senha </label>
                </div>
                <br><br>
                <!--Telefone-->
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput"> Telefone </label>
                </div>
                <!--Sexo-->
                <p>Sexo: </p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <!--Data-->
                    <label for="data_nascimento"> <b> Data de Nascimento: </b> </label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <!--Endereço-->
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput"> Cidade </label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput"> Estado </label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput"> Endereço </label>
                </div>
                <br><br>
                <!--Botão-->
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>