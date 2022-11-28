<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STARDEOS :V </title>
    <link rel="stylesheet" href="css/estilo.css" type="text/css">
</head>
<body bgcolor="8a,b6,ec">
    <header>
        <div id="logo"><!--Id para trabajar con css-->
            <img src="img/logo.png" alt="logo" height="110" width="190">
        </div>
        <nav class="menu">
            <ul> <!--Lista desordenada-->
                <li><a href="index.html">Inicio</a></li>
                <li><a href="miperfil.php">Mi Perfil</a></li>
                <li><a href="amigos.php">Mis Amigos</a></li>
                <li><a href="fotos.php">Mis Fotos</a></li>
                <li><a href="agregar.php">Buscar Amigos</a></li>
               <li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header>
    
        <section id="perfil">
            <img src="<?php  echo "$_SESSION[fotoPerfil]"  ?>" width="300" height="400">
            <h1><?php echo "$_SESSION[nombre] $_SESSION[apellidos]" ?></h1>

            <h3><form action="php/CambiarFoto.php" method="post" enctype="multipart/form-data"/>
                Añadir Imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png, .webp" required />
                <input type="submit" name="subir" value="Subir"/>
                </form></h3>

                <p class="parrafo"><?php echo "$_SESSION[descripcion]" ?></p>
        </section>
    
    <section id="recuadros">
        <h2>Mis Amigos</h2>
        <?php
            $consulta="Select * From persona P Where P.Nickname in (Select A.Nickname2 From amistad A Where A.Nickname1='$nickname') LIMIT 3";
            $datos=mysqli_query($conexion, $consulta);
            while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil'] ?>" height="150">
            <h2><?php echo $fila['Nombre']. "" . $fila['Apellidos'] ?></h2>
            <p class="parrafo"><?php echo $fila['Descripcion'] ?></p>
            <a href="<?php echo "perfilAmigo.php?nickname=". $fila['Nickname'] ?>" class="boton">Ver Perfil</a><br><br><br>
        </section>
        <?php
            }
        ?>
    </section>

    <section id="recuadros">
        <h2>Mis Fotos</h2>
        <?php
            $consulta="Select * From fotos F Where F.Nickname='$nickname' Limit 3";
            $datos=mysqli_query($conexion, $consulta);
            while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['NombreFoto'] ?>" height="200" width="296">
        </section>
        <?php
        }
        ?>
    </section>
    
    <footer>
        <p>Copyright &copy; Gpzov ESTARDEOS :V </p>
    </footer>
</body>
</html>
