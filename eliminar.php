<?php

require_once "conexion.php";

if (!isset($_POST['id'])) {
    echo "No se recibió el ID del libro.";
    exit;
}

$id = $_POST['id'];

$sql = "DELETE FROM libro WHERE id_libro = :id";

$consulta = $pdo->prepare($sql);

$consulta->execute(['id' => $id]);

echo "Libro eliminado correctamente.";
echo "<br><a href='index.php'>Volver al listado</a>";
