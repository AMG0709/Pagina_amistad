<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Grupo pikante</title>
    <link href="css/estilo.css" rel='stylesheet' type='text/css' /> 
</head>
<body>
  <header>
     <div id ="logo">  <!-- id para trabajar con css-->
	    <img src="img/logo.png" alt="logo" height="80" width="200">
	 </div>
	 <nav class="menu">
		<ul> <!--lista desordenada-->
			<li> <a href="index.html">Inicio</a></li>
			<li> <a href="miperfil.php">Mi perfil</a></li>
			<li> <a href="amigos.php">Mis amigos</a></li>
			<li> <a href="fotos.php">Mis fotos</a></li>
			<li> <a href="agregar.php">Buscar amigos</a></li>
			<li> <a href="php/CerrarSesion.php">Cerrar Sesión</a></li>
		</ul>
	 </nav>
  </header>
  
  <section id="recuadros">
	<h2> Mis Fotos</h2>
	
	<h3><form action="php/SubirFoto.php" method="POST" enctype="multipart/form-data"/>
	Añadir Imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
	<input type="submit" name="subir" value="Subir" />
	</form> </h3>
	
	<?php
	$consulta="Select * From fotos F Where F.Nickname='$nickname' ";
	$datos=mysqli_query($conexion, $consulta);
	while($fila=mysqli_fetch_array($datos)){
	?>
	
	<section class="recuadro">
		<img src="<?php echo $fila['NombreFotos']?>"  height="200" width="296">
  </section>
  	 
	 <?php
	}
    ?>
 </section> 
  <footer>
     <p>Copyright &copy;  Gpzo STARDEOS :V </p>
  </footer>
  
</body>
</html>
