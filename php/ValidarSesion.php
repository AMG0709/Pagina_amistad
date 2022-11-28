<?php
session_start();//Inicia una nueva sesion o reanuda la existente
$login=$_SESSION['login'];//$_SESSION es una variable super global

if(!$login)
{
    header('Location:../index.html');
}
else
{
    $nickname = $_SESSION['nickname'];
}
?>