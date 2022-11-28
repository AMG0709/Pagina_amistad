<?php
include("conexion.php"); //Llamar el archivo conexion


//datos enviados por el formulario

$nickname = $_POST["nickname"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$edad = $_POST["edad"];
$descripcion = $_POST["descripcion"];
$email = $_POST["correo"];
$password = $_POST["contraseña"];

//Encriptar el valor

$passwordHash=password_hash($password,PASSWORD_BCRYPT);
//Se encripta password con el algoritmo BCRYPT

$fotoPerfil="img/$nickname/perfil.jpg";
//Ingresamos el nombre de la foto de perfil por defecto

$consultaId="SELECT Nickname FROM persona WHERE Nickname='$nickname'";
$consultaId=mysqli_query($conexion,$consultaId); //Devuelve false si no existe un usuario con ese nombre y true si ya existe
$consultaId=mysqli_fetch_array($consultaId); //Crea un arreglo 

if(!$consultaId){

    $sql="INSERT INTO persona VALUES('$nickname','$nombre','$apellidos','$edad','$descripcion','$fotoPerfil','$email','$passwordHash')";
    if(mysqli_query($conexion,$sql)){
        mkdir("../img/$nickname"); //Crea una carpeta en imagenes para el nuevo usuario.
        copy("../img/default.jpeg","../img/$nickname/foto.jpg");
    }
    else{
        echo "Error ".$sql . "<br>" . mysqli_error($conexion);
    }

}
else{
    echo "El nombre de usuario (Nickname) ya existe, por favor elija uno nuevo";
    echo "<br><a href='../index.html'> Intentalo de Nuevo :)</a>";
}

//cerrando la conexion
mysqli_close($conexion);

?>