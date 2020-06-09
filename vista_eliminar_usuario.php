<?php
	include 'conexion/conexion.php';
	
	$Id_Usuario = $_POST["Id_Usuario"];

	$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '$Id_Usuario'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$idusuarios = $row['idusuarios'];

	echo "¿Desea eliminar el usuario "; echo $nombre.' '.$apellido; echo" con el Código #"; echo $idusuarios; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idusuario_eli" name="idusuario_eli" value="<?php echo $Id_Usuario; ?>">
</form>

<script src="js/datos.js"></script>