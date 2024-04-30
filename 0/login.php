<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="login.css">
</head>
<body>
    <a href="home.php">Voltar</a>
    <div class="login">
        <h1>Login</h1>
        <form action="testLogin.php" method="post">
            <input type="text" id="email" name="email"  placeholder="Email" required>
            <br><br>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>