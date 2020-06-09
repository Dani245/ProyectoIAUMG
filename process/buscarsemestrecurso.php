<?php

include '../conexion/conexion.php';


$tabla="";

if(isset($_POST['consultasemestre'])){	

	$consultasemestre = $_POST['consultasemestre'];	

	$consultacur=mysqli_query($conn, "SELECT * FROM curso WHERE idsemestre = '".$consultasemestre."' "); 	
}

$buscarcur=mysqli_num_rows($consultacur);

if($buscarcur>0){
	$tabla.='
	<table class="table table-bordered">
		<thead bgcolor="#6299DB" align="center">
			<tr>
				<td class="text-center"><strong>ID Curso</strong></td>					
				<td class="text-center"><strong>Nombre</strong></td>
				<td class="text-center"><strong>Requisito</strong></td>
				<td class="text-center"><strong>Creditos</strong></td>								
				<td class="text-center"><strong>Acciones</strong></td>	
			</tr>
		</thead>
	';

	while($filacurso=mysqli_fetch_array($consultacur)){			
		$tabla.='
			<tr>
				<td class="table-secondary text-center"> '.$filacurso['idcurso'].'</td>
				<td class="table-secondary text-center"> '.$filacurso['nombre'].'</td>
				<td class="table-secondary text-center"> '.$filacurso['requisito'].'</td>
				<td class="table-secondary text-center"> '.$filacurso['creditos'].'</td>
									
				<td align="center">
					<button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalAsignarCurso" onclick="btn_asignar_curso('.$filacurso['idcurso'].');">Asignar Curso</button>
            	</td>                                    
			</tr>
		';		
				
	}
	$tabla.='</table>';
}
else{
	$tabla="<h2> No se encontraron coincidencias con sus criterios de busqueda </h2>";	
}

echo $tabla;
?>
