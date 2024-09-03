<?php

$host = "localhost:3308";
$db = "justicia_para_todos";
$usuario = "root";  // Asegúrate de que el usuario es correcto
$clave = "";  // Reemplaza con la contraseña correcta

$conexion = mysqli_connect($host, $usuario, $clave, $db);

if(mysqli_connect_errno())
{
    echo "Error al conectar con la Base de Datos: " . mysqli_connect_error();
    exit();
}

$conexion->set_charset("utf8");


?>