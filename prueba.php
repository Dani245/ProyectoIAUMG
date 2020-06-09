<?php

$password = "alumno";

$pass = password_hash($password, PASSWORD_DEFAULT);;

echo "$pass";

?>