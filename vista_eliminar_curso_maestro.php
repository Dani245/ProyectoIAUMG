<?php
	include 'conexion/conexion.php';
	
	$Id_asignacion = $_POST["Id_asignacion"];

	$sql = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idasignacion_usuario = '$Id_asignacion'");
	$row = mysqli_fetch_array($sql);
	

	echo "¿Desea eliminar esta asignacion con el Código #"; echo $Id_asignacion = $row['idasignacion_usuario']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idasignacionmaes_eli" name="idasignacionmaes_eli" value="<?php echo $Id_asignacion; ?>">
</form>

<script src="js/datos.js"></script>