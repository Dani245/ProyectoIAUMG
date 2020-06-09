<?php
	include 'conexion/conexion.php';
	
	$Id_Carrera = $_POST["Id_Carrera"];

	$sql = mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera = '$Id_Carrera'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];

	echo "¿Desea eliminar la Carrera "; echo $nombre; echo" con el Código #"; echo $Id_Carrera = $row['idcarrera']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idcarrera_eli" name="idcarrera_eli" value="<?php echo $Id_Carrera; ?>">
</form>

<script src="js/datos.js"></script>