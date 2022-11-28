<?php

//Declarar variables

$servidor="localhost";  //el seervidor sera el localhost
$usuario="root";        //el usuario de la base de datos
$contrasena="";
$BD="red_social";        //el nombre de la base de datos

//creando la conexion
$conexion=mysqli_connect($servidor,$usuario,$contrasena,$BD);

//verificando la conexion
if(!$conexion){
    echo "Falló la conexion <br>";
    die("Connection failed".mysqli_connect_error());
}
else{
   // echo "Conexion Exitosa <br>";
}

?>