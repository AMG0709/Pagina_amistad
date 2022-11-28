<?php
include("conexion.php");
include("ValidarSesion.php");

$nicknameA= $_GET['nickname'];
$consulta = "INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nickname', '$nicknameA')";

//Error aqui 
if(mysqli_query($conexion, $consulta)){
$consulta = "INSERT INTO amistad (Nickname1, Nickname2) VALUES ('$nicknameA', '$nickname')";
    if(mysqli_query($conexion, $consulta)){
        echo "¡Ahora tienes un nuevo amigo!";
        header('Location: ../agregar.php');
    }
    else{
        echo "Error ";
        echo "<a href='../agregar.php'> Volver </a>";
    }
}
else{
    echo "Error en la conexion o consulta";
    echo "<a href='../agregar.php'> Volver </a>";
}

?>