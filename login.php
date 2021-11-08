<?php
session_start();

if (isset($_SESSION['usuario_id'])) {

header('location: /Celucentrum');
}
//para poder validar la cunta que se creo se realizara esta validacion de datos a traves de database.php
  require 'database.php';
  //comprobacion
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    //ejecuta la consulta 
    //aumentar datos aca
    $records = $conn->prepare('SELECT id , email, password FROM usuario WHERE email=:email');
    //reemplaza lo que s obtiene del metodo POST
    $records->bindParam(':email', $_POST['email']);
    //luego se ejecuta
    $records->execute();
    //fetch 
    $results= $records->fetch(PDO::FETCH_ASSOC);
    $message ='';
    //SESION ejecuta o almacena un dato
    if (count($results)>0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['usuario_id'] = $results['id'];
      //header para redireccionar a la pagina 
      //modificar esta parte porsiacaso 
      header('location: /Celucentrum');
    }
    else {
      $message='lo siento usuario no existe';
    }
    
  }

?>

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

      <?php if (!empty($message)): ?>
      <p><?=$message?></p>
      
      <?php endif;?>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingrese su correo">
      <input name="password" type="password" placeholder="Ingrese su contraseña ">
      <input type="submit" value="Ingresar">
    </form>



</body>
</html>