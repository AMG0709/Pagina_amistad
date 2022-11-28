<?php
session_start(); //Inicia una nueva sesion o reanuda la existente
$_SESSION=array();//Limpia las variables super globales de sesion

session_destroy();//Destruir todas las variables de sesion
header('Location: ../index.html');
?>