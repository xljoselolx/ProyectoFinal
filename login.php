<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php require 'partials/header.php'?>

    <h1>Login</h1>
    <span>Si aun no tiene cuenta: <a href="registro.php">Registrese</a></span>
    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su correo">
      <input name="password" type="password" placeholder="Ingrese su contraseña ">
      <input type="submit" value="Ingresar">
    </form>



</body>
</html>