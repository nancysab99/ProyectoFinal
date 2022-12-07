<?php
//iniciamos la sesion que se estaba utilizando
require "funciones.class.php";
$funciones= new funciones($mysqli);
$funciones->iniciarsesion();

//borrar variables de sesion
$_SESSION = array();


// destruir la sesion
session_destroy();

//regresamos al index
header("location: ./index.php");
?>