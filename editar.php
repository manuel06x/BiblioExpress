<?php

require_once "conexion.php";

if (!isset($_GET['id'])) {
    echo "No se encontró el ID del libro.";
    exit;
}

$id = $_GET['id'];

// Si se envió el formulario, actualizar el libro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $ano_publicacion = $_POST['ano_publicacion'];
    $idioma = $_POST['idioma'];
    $numero_paginas = $_POST['numero_paginas'];

    if (empty($titulo)) {
        echo "El título es obligatorio";
        exit;
    }

    if (empty($isbn)) {
        echo "El ISBN es obligatorio";
        exit;
    }

    if (empty($ano_publicacion)) {
        echo "El año es obligatorio";
        exit;
    }

    if (empty($idioma)) {
        echo "El idioma es obligatorio";
        exit;
    }

    if (empty($numero_paginas)) {
        echo "El número de páginas es obligatorio";
        exit;
    }

    if ($ano_publicacion <= 1500) {
        echo "El año debe ser mayor a 1500.";
        exit;
    }

    if ($numero_paginas <= 0) {
        echo "El número de páginas debe ser mayor a 0.";
        exit;
    }

    // Comprobar ISBN duplicado
    $sql = "SELECT id_libro FROM libro WHERE isbn = :isbn AND id_libro != :id";
    $consulta = $pdo->prepare($sql);
    $consulta->execute(['isbn' => $isbn, 'id' => $id]);

    if ($consulta->fetch()) {
        echo "Este ISBN ya está registrado.";
        exit;
    }

    // Actualizar libro
    $sql = "UPDATE libro SET titulo = :titulo, isbn = :isbn, ano_publicacion = :ano_publicacion, idioma = :idioma, numero_paginas = :numero_paginas WHERE id_libro = :id";

    $consulta = $pdo->prepare($sql);

    $consulta->execute([
        'titulo' => $titulo,
        'isbn' => $isbn,
        'ano_publicacion' => $ano_publicacion,
        'idioma' => $idioma,
        'numero_paginas' => $numero_paginas,
        'id' => $id
    ]);

    echo "Libro actualizado correctamente.";
    echo "<br><a href='index.php'>Volver al listado</a>";
    exit;
}

// Consultar libro por su ID
$sql = "SELECT * FROM libro WHERE id_libro = :id";
$consulta = $pdo->prepare($sql);
$consulta->execute(['id' => $id]);

$libro = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$libro) {
    echo "Libro no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 30px auto;
            max-width: 1000px;
            padding: 20px;
        }

        h1 {
            color: #243b53;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #243b53;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input:not([type="hidden"]) {
            width: 100%;
            max-width: 450px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        button:hover {
            background-color: #1d4ed8;
        }
    </style>

    <title>Editar Libro</title>
</head>

<body>

    <h1>Editar Libro</h1>

    <form method="post" action="editar.php?id=<?php echo $id; ?>">

        <label>Título</label>
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>">

        <label>ISBN</label>
        <input type="text" name="isbn" value="<?php echo htmlspecialchars($libro['isbn']); ?>">

        <label>Año de publicación</label>
        <input type="number" name="ano_publicacion" value="<?php echo $libro['ano_publicacion']; ?>">

        <label>Idioma</label>
        <input type="text" name="idioma" value="<?php echo htmlspecialchars($libro['idioma']); ?>">

        <label>Número de páginas</label>
        <input type="number" name="numero_paginas" value="<?php echo $libro['numero_paginas']; ?>">

        <button type="submit">Actualizar Libro</button>

    </form>

</body>

</html>