<?php

//destruye la sesion y redirecciona al indice principal de la pagina 
session_start(); 
session_unset();
session_destroy();
header("Location: ../ingreso.php"); 
?>
