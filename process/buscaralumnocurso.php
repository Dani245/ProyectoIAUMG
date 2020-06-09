<?php

include '../conexion/conexion.php';


$tabla="";

if(isset($_POST['consultacurso'])){	

	$consultacurso = $_POST['consultacurso'];	

	$consultacur=mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idcurso = '".$consultacurso."' "); 	
}

$buscarcur=mysqli_num_rows($consultacur);

if($buscarcur>0){
	$tabla.='
	<table class="table table-bordered">
		<thead bgcolor="#ED6B6B" align="center">
			<tr>					
				<td class="text-center"><strong>Carnet</strong></td>
				<td class="text-center"><strong>Alumno</strong></td>
				<td class="text-center"><strong>Email</strong></td>
				<td class="text-center"><strong>Curso</strong></td>								
				<td class="text-center"><strong>Nota Total</strong></td>								
				<td class="text-center"><strong>Acciones</strong></td>	
			</tr>
		</thead>
	';

	while($filaasignacion=mysqli_fetch_array($consultacur)){
		
		$nombre_cur=mysqli_query($conn, "SELECT * FROM curso");
        while($filacurso=mysqli_fetch_array($nombre_cur))
    	{
        	if($filaasignacion['idcurso']  == $filacurso['idcurso'])
            {
                $nombre_usu=mysqli_query($conn, "SELECT * FROM usuarios");
                while($filausuarios=mysqli_fetch_array($nombre_usu))
                {
                    if($filaasignacion['idusuarios']  == $filausuarios['idusuarios'])
                    {                                    
                        $nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Alumno'");
                        while($filatipo=mysqli_fetch_array($nombre_tipo))
                        {
                            if($filausuarios['idtipousuario']  == $filatipo['idtipousuario'])
                            {
								$calificacion=mysqli_query($conn, "SELECT * FROM calificacion WHERE idusuarios='".$filausuarios['idusuarios']."' AND idcurso = '".$filacurso['idcurso']."'");
			
								$rowcal=mysqli_num_rows($calificacion);								
								if($rowcal>0){
									while($filacalificacion=mysqli_fetch_array($calificacion))
                					{
										$tabla.='
											<tr>
												<td class="table-secondary text-center"> '.$filausuarios['carnet'].'</td>										
												<td class="table-secondary text-center"> '.$filausuarios['nombre'].' '.$filausuarios['apellido'].'</td>
												<td class="table-secondary text-center"> '.$filausuarios['email'].'</td>
												<td class="table-secondary text-center"> '.$filacurso['nombre'].' </td>																											
												<td class="table-secondary text-center"> '.$filacalificacion['total'].' </td>
												<td align="center"></td>                                    
											</tr>
										';	
									}								
								}
								else{									
										$tabla.='
											<tr>
												<td class="table-secondary text-center"> '.$filausuarios['carnet'].'</td>										
												<td class="table-secondary text-center"> '.$filausuarios['nombre'].' '.$filausuarios['apellido'].'</td>
												<td class="table-secondary text-center"> '.$filausuarios['email'].'</td>
												<td class="table-secondary text-center"> '.$filacurso['nombre'].' </td>																											
												<td class="table-secondary text-center"> Nota No Ingresada </td>
									
												<td align="center">
												<button class="btn btn-success btn-xs" style="width: 30% align="center"; data-toggle="modal"  data-toggle="modal" data-target="#myModalAgregarNota" onclick="btn_agregar_nota('.$filausuarios['idusuarios'].', '.$filacurso['idcurso'].');">Agregar Nota</button>
                    	                	    </td>                                    
											</tr>
										';										
								}
                            }
                        }
                    }
                }                                    
            }    
        }

		
				
	}
	$tabla.='</table>';
}
else{
	$tabla="<h2> No se encontraron coincidencias con sus criterios de busqueda </h2>";	
}

echo $tabla;
?>
