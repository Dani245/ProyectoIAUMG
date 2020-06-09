<?php
	include 'conexion/conexion.php';
	
	$Id_TipoUsuario = $_POST["Id_TipoUsuario"];

	$sql = mysqli_query($conn, "SELECT * FROM tipousuario WHERE idtipousuario = '$Id_TipoUsuario'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];

	echo "¿Desea eliminar el Rol "; echo $nombre; echo" con el Código #"; echo $Id_TipoUsuario = $row['idtipousuario']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idtipousuario_eli" name="idtipousuario_eli" value="<?php echo $Id_TipoUsuario; ?>">
</form>

<script src="js/datos.js"></script>