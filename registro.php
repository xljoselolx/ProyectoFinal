<?php

    require 'database.php';
    $message ='';

    if (!empty($_POST['email'])&& !empty($_POST['password'])) {
        // para ingresar datos a la base de datos es esta variable
        $sql = "INSERT INTO usuario (email,password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        //vincular parametros
        $stmt->bindParam(':email', $_POST['email']);
        //guarda lavariable momentaneamente
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        //confirmar registro
        if ($stmt->execute()) {
            $message = 'Se ha registrado un nuevo usuario';
        }
        else {
            $message = 'lo siento a ocurrido un error al crear la contraseña ';
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>
    
    <?php require 'partials/header.php'?>
    <?php if (!empty($message)):?> 
        <p><?= $message ?></p>
    <?php endif;?>

    <h1>Registro</h1>
    <span>Si ya tiene cuenta: <a href="login.php">Ingrese</a></span>
    
    <form action="registro.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su correo">
      <input name="password" type="password" placeholder="Ingrese su contraseña ">
      <input name="confirm_password" type="password" placeholder="Confirme su contraseña ">
      <input type="submit" value="Ingresar">
    </form>

    </form>

</body>
</html>