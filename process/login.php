<?php

	if (!isset($_SESSION)) {
		session_start();	
	}
	else{
		session_destroy();
		session_start();
	}	
	include '../conexion/conexion.php';
	sleep(2);
	$email=$_POST['email'];
	$password=$_POST['password'];
	if (!$email=="" && !$password=="") {
		$verUsuario=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email'");
		$usuario=mysqli_fetch_array($verUsuario);
		$usuariotipo=$usuario['idtipousuario'];				
		$verTipo=mysqli_query($conn, "SELECT * FROM tipousuario WHERE idtipousuario='$usuariotipo'");
		$tipo=mysqli_fetch_array($verTipo);
		$tiponombre=$tipo['nombre'];
		$passa=$usuario['pass'];		
		if ($tiponombre=='Administrador'){			

			if ($usuario > 0 && password_verify($password, $passa)===TRUE) {
				$_SESSION['emailAdmin']=$email;
				$_SESSION['passwordAdmin']=$password;
				echo '<script> location.href="../admin.php"; </script>';				
				//echo "Hola Administrador";
			}
			else{
				echo"<script type=\"text/javascript\">alert('Error, usuario contraseña invalida ingrese los datos nuevamente'); window.location='../ingreso.php';</script>";  
			}
		}

		else if ($tiponombre=='Maestro') {			
						
			if ($usuario > 0 && password_verify($password, $passa)===TRUE) {
				$_SESSION['emailMaestro']=$email;
				$_SESSION['passwordMaestro']=$password;
				echo '<script> location.href="../maestro.php"; </script>';
				//echo "Hola Maestro";				
			}
			else{
				echo"<script type=\"text/javascript\">alert('Error, usuario o contraseña invalida ingrese los datos nuevamente'); window.location='../ingreso.php';</script>";  
			}
		}

		else if($tiponombre=='Alumno'){

			if ($usuario > 0 && password_verify($password, $passa)===TRUE) {
				$_SESSION['emailAlumno']=$email;
				$_SESSION['passwordAlumno']=$password;
				echo '<script> location.href="../alumno.php"; </script>';				
				//echo "Hola Alumno";
			}
			else{
				echo"<script type=\"text/javascript\">alert('Error, usuario o contraseña invalida ingrese los datos nuevamente'); window.location='../ingreso.php';</script>";  
			}
		}

		else{
			echo"<script type=\"text/javascript\">alert('Error, usuario o contraseña invalido ingrese los datos nuevamente'); window.location='../ingreso.php';</script>";  
		}
	}else{
		echo"<script type=\"text/javascript\">alert('Ha ocurrido un error, por favor ingrese todos los datos necesarios'); window.location='../ingreso.php';</script>"; 
	}
?>