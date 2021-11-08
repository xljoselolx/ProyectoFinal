
<?php
//vamos a comprobar la variable de sesion mediante ia id
session_start();
    require'database.php';
    if (isset($_SESSION['usuario_id'])) {
        //modificar los datos a mostrar
        $records = $conn->prepare('SELECT id, email,password FROM usuario WHERE id = :id');
        //vincular el parametro id
        $records->bindParam(':id', $_SESSION['usuario_id']);
        $records->execute();
        //obtiene la consulta desde la base de datos con el result
        $results = $records->fetch(PDO::FETCH_ASSOC);
        //para almacenar datos creamos un nueva variable
        $user =null;
        if (count($results)>0) {
            $user = $results;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CELUCENTRUM</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php'?>
<?php 
// si ya esta registrado muestra este mensaje 
if (!empty($user)):?>
<br>Bienvenido.<?= $user['email'] ?>
<br>ha iniciado sesión correctamente 
<a href="logout.php">Logout</a>

<?php 
//caso contrario 
else:
?>
    <h1>Bienvenido a Celucentrum </h1>
    <h2>Por Inicie sesion o Registrese</h2>
    <a href="login.php">Login</a> or 
    <a href="registro.php">Registro</a>
    <?php endif; ?> 
</body>
</html>