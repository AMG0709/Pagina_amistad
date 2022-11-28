<?php
include("conexion.php"); //Llama el archivo conexion.

session_start();//Inicia una nueva sesion o reanuda la existente.

$_SESSION['login']=false; //$_SESSION es una variable super global.

//Recibir y guardar datos enviados desde el formulario.
$nickname=$_POST["nickname"];
$password=$_POST["contraseña"];

//Evaluando nickname ingresado
$consulta="SELECT * FROM persona WHERE Nickname = '$nickname'";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);

if($consulta)
{
    //Se verifica el password que sea correcto.
    if(password_verify($password, $consulta['Password']))
    {
        $_SESSION['nickname']   =$consulta['Nickname'];
        $_SESSION['nombre']     =$consulta['Nombre'];
        $_SESSION['apellidos']  =$consulta['Apellidos'];
        $_SESSION['edad']       =$consulta['Edad'];
        $_SESSION['descripcion']=$consulta['Descripcion'];
        $_SESSION['fotoPerfil'] =$consulta['FotoPerfil'];
        $_SESSION['login']      =true;

        header('Location:../miperfil.php');
        //Redireccionando a la pagina "mi perfil".
    }
    else{
        echo "Contraseña incorrecta, ¡ALERTA! Un intruso detectado";
        echo "<br><a href='../index.html'> Intentelo de nuevo. </a>";
    }
}
else{
    echo "¡¡Usuario no encontrado!! No me quieras engañar -_-";
    echo "<br><a href='../index.html'> Intentelo de Nuevo. </a>";
}
?>