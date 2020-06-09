<?php
	include 'conexion/conexion.php';
	
	$Id_Curso = $_POST["Id_Curso"];

	$sql = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '$Id_Curso'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];

	echo "¿Desea eliminar el Curso "; echo $nombre; echo" con el Código #"; echo $Id_Curso = $row['idcurso']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idcurso_eli" name="idcurso_eli" value="<?php echo $Id_Curso; ?>">
</form>

<script src="js/datos.js"></script>