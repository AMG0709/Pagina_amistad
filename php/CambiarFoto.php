<?php
include("ValidarSesion.php");

$ubicacion="../img/$nickname/perfil.jpg";
$archivo=$_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo,$ubicacion))
{
    echo "Archivo subido exitosamente";
    header('Location:../miperfil.php'); //Redireccionar a la pagina miperfil.php
}
else{
    echo "Ha ocurrido un error inesperado, intente de nuevo";
    echo "<br><a href='../miperfil.php'> Volver. </a>";
}
?>