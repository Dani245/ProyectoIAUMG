<?php
	include 'conexion/conexion.php';
	
	$Id_Municipio = $_POST["Id_Municipio"];

	$sql = mysqli_query($conn, "SELECT * FROM municipio WHERE idmunicipio = '$Id_Municipio'");
	$row = mysqli_fetch_array($sql);

	$nombre = $row['nombre'];

	echo "¿Desea eliminar el municipio "; echo $nombre; echo" con el Código #"; echo $Id_Municipio = $row['idmunicipio']; echo "?";
?>

<!--Panel de Eliminar-->
<form  method="post" role="form">
	<input type="hidden" class="form-control" id="idmunicipio_eli" name="idmunicipio_eli" value="<?php echo $Id_Municipio; ?>">
</form>

<script src="js/datos.js"></script>