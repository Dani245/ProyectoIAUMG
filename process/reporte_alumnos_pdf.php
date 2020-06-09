<?php

//AddPage(Orientacion[portrait, landscape], tamanio[A3,A4,A5,LETTER,LEGAL], rotacion)
//SentFont(tipo[courier,helvetica,arial,times,symbol,zapdingbats], estilo[normal,B,I,U], tamanio)
//Cell(ancho,alto,texto,bordes,?,alineacion,rellenar,link)
//Write(alto,texto,link)
//OutPut(destino[I,D,F,S], nombre_archivo,utf8)
//Image(ruta,posicionx,posiciony,alto,ancho,tipo,link)
//$fpdf->PageNo()
//$fpdf->AliasNbPages()
//"numero de pagina 1 de {nb}"

require('../fpdf/fpdf.php');

$consultacurso=$_POST['consultacurso'];

$fpdf = new FPDF();
$fpdf->AddPage('portrait', 'letter');

class pdf extends FPDF
{
	public function header()
	{
		$this->SetFont('arial', 'B', 10);
		$this->Cell(0,5, 'Listado de Alumnos', 0, 0, 'C');
		$this->Image('../img/logo.png', 190, 5, 20, 20, 'png');
	}

	public function footer()
	{
		$this->SetFont('arial', 'B', 10);
		$this->SetY(-15);
		$this->Write(5, 'Chiquimulilla, Santa Rosa, Guatemala');
		$this->SetX(-25);
		$this->Write(5, $this->PageNo());
	}
}

//consulta a la base de datos
include('../conexion/conexion.php'); //CONSULTA A LA BASE DE DATOS

if (!empty($consultacurso)) {
	$asignacion = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idcurso = '".$consultacurso."' ");
	$curso = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '".$consultacurso."' ");	
}





$fpdf = new pdf('P', 'mm','letter', true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetMargins(10,30,20,20);

$fpdf->SetFont('Arial', 'B', 14);
$fpdf->SetY(30);
$fpdf->SetTextColor(68,78,78);

while($nombrecurso = $curso->fetch_assoc()){
	$fpdf->Cell(0,5,$nombrecurso['nombre'],0,0,'C');		
}

$fpdf->SetDrawColor(196,107,19);
$fpdf->SetLineWidth(1);
$fpdf->Line(30, $fpdf->GetY() + 8, 180, $fpdf->GetY() + 8);

$fpdf->Ln(20);

//SetFillColor()
//SetDrawColor()

$fpdf->SetFontSize(10);
$fpdf->SetFont('Arial', '');
//$fpdf->SetFillColor(196,107,19);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextColor(40,40,40);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(30,10,'Carnet',0,0,'C',1);
$fpdf->Cell(85,10,'Alumno',0,0,'C',1);
$fpdf->Cell(60,10,'Email',0,0,'C',1);
$fpdf->Cell(20,10,'Nota',0,0,'C',1);
$fpdf->SetDrawColor(196,107,19);
$fpdf->SetLineWidth(1);
$fpdf->Line(10,60,205,60);
$fpdf->SetTextColor(0,0,0);

//imprimir datos de la base de datos estudiantes
$fpdf->SetLineWidth(0.20);
$fpdf->SetFillColor(240,240,240);
$fpdf->SetTextColor(40,40,40);
$fpdf->SetDrawColor(255,255,255);
$fpdf->Ln(12);

while($filaasignacion = $asignacion->fetch_assoc()){

	$nombre_cur=mysqli_query($conn, "SELECT * FROM curso");
	while($filacurso = $nombre_cur->fetch_assoc()){

		if($filaasignacion['idcurso']  == $filacurso['idcurso']){

			$nombre_usu=mysqli_query($conn, "SELECT * FROM usuarios");
			while($filausuarios = $nombre_usu->fetch_assoc()){

				if($filaasignacion['idusuarios']  == $filausuarios['idusuarios']){

					$nombre_tipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Alumno'");
					while($filatipo = $nombre_tipo->fetch_assoc()){

						if($filausuarios['idtipousuario']  == $filatipo['idtipousuario']){

							$calificacion=mysqli_query($conn, "SELECT * FROM calificacion WHERE idusuarios='".$filausuarios['idusuarios']."' AND idcurso='".$filacurso['idcurso']."'");
							$rowcal=mysqli_num_rows($calificacion);								
							if($rowcal>0){
								while($filacalificacion = $calificacion->fetch_assoc()){
									$fpdf->Cell(30,10,$filausuarios['carnet'],1,0,'C',1);
									$fpdf->Cell(85,10,$filausuarios['nombre'].' '.$filausuarios['apellido'],1,0,'C',1);
									$fpdf->Cell(60,10,$filausuarios['email'],1,0,'C',1);						
									$fpdf->Cell(20,10,$filacalificacion['total'],1,0,'C',1);														
									$fpdf->Ln();
								}				
							}
							else{								
								$fpdf->Cell(30,10,$filausuarios['carnet'],1,0,'C',1);
								$fpdf->Cell(85,10,$filausuarios['nombre'].' '.$filausuarios['apellido'],1,0,'C',1);
								$fpdf->Cell(60,10,$filausuarios['email'],1,0,'C',1);														
								$fpdf->Cell(20,10,'NNI',1,0,'C',1);						
								$fpdf->Ln();
							}
										
						}
					}
				}
			}
		}
	}
}


$fpdf->Close();
$fpdf->OutPut('I','Alumnos.pdf');

?>

