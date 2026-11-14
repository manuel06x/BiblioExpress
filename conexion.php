<?php

$host = "localhost";
$dbname = "biblio_express";
$motor = "mysql";

$usuario = "root";
$contrasena = "";

$conexion = $motor . ":host=" . $host . ";dbname=" . $dbname;

try {
    $pdo = new PDO($conexion, $usuario, $contrasena, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $error) {
    echo "Error al conectar con la base de datos.";
}
