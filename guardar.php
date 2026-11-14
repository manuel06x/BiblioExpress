
<?php

require_once "conexion.php";

$titulo = $_POST['titulo'];
$isbn = $_POST['isbn'];
$ano_publicacion = $_POST['ano_publicacion'];
$idioma = $_POST['idioma'];
$numero_paginas = $_POST['numero_paginas'];

if (empty($titulo)) {
    echo "El campo es Obligatorio";
    exit;
}

if (empty($isbn)) {
    echo "El campo es Obligatorio";
    exit;
}

if (empty($ano_publicacion)) {
    echo "El campo es Obligatorio";
    exit;
}

if (empty($idioma)) {
    echo "El campo es Obligatorio";
    exit;
}

if (empty($numero_paginas)) {
    echo "El campo es Obligatorio";
    exit;
}

if ($ano_publicacion <= 1500) {
    echo "El año de publicación debe ser mayor a 1500.";
    exit;
}

if ($numero_paginas <= 0) {
    echo "El número de páginas debe ser mayor a 0.";
    exit;
}

// Consultar si el ISBN ya existe
$sql = "SELECT * FROM libro WHERE isbn = :isbn";
$consulta = $pdo->prepare($sql);
$consulta->execute(['isbn' => $isbn]);

if ($consulta->fetch()) {
    echo "Este ISBN ya está registrado.";
    exit;
}

// Registrar el libro
$sql = "INSERT INTO libro (titulo, isbn, ano_publicacion, idioma, numero_paginas)
        VALUES (:titulo, :isbn, :ano_publicacion, :idioma, :numero_paginas)";

$consulta = $pdo->prepare($sql);

$consulta->execute([
    'titulo' => $titulo,
    'isbn' => $isbn,
    'ano_publicacion' => $ano_publicacion,
    'idioma' => $idioma,
    'numero_paginas' => $numero_paginas
]);

echo "Libro registrado correctamente.";
echo "<br><a href='index.php'>Volver al listado</a>";
