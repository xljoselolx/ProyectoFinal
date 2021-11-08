<?php 
session_start();
//quitar sesion
session_unset();
//destruir sesion
session_destroy();
//redireccionar a la pagina principal
header('location: /Celucentrum');
?>
