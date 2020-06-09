<?php
	include 'conexion/conexion.php';
	
	$Id_Semestre = $_POST["Id_Semestre"];

	$sql = mysqli_query($conn, "SELECT * FROM semestre WHERE idsemestre = '$Id_Semestre'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];

	echo "¿Desea eliminar el Semestre "; echo $nombre; echo" con el Código #"; echo $Id_Semestre = $row['idsemestre']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idsemestre_eli" name="idsemestre_eli" value="<?php echo $Id_Semestre; ?>">
</form>

<script src="js/datos.js"></script>