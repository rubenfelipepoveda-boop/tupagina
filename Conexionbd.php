<?php
session_start();
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$base_datos = "tupagina";

// Crear conexión con puerto
$conn = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    echo "la base de datos no fue conectada";
} else {
    echo " Conexión exitosa a la base de datos en el puerto.<br>";
}
?>