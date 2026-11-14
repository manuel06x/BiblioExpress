<?php

require_once "conexion.php";

$resultados = $pdo->query("SELECT * FROM libro");
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

    <title>BiblioExpress</title>
</head>

<body>
    <h1>BiblioExpress</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>ISBN</th>
            <th>Año</th>
            <th>Idioma</th>
            <th>Paginas</th>
            <th>Acciones</th>
        </tr>

        <?php
        while ($libro = $resultados->fetch()) {
        ?>
            <tr>
                <td>
                    <?php echo $libro["id_libro"]; ?>
                </td>
                <td>
                    <?php echo $libro["titulo"]; ?>
                </td>
                <td>
                    <?php echo $libro["isbn"]; ?>
                </td>
                <td>
                    <?php echo $libro["ano_publicacion"]; ?>
                </td>
                <td>
                    <?php echo $libro["idioma"]; ?>
                </td>
                <td>
                    <?php echo $libro["numero_paginas"]; ?>
                </td>
                <td>
                    <a href="editar.php?id=<?php echo $libro['id_libro']; ?>">Editar</a>

                    <form method="post" action="eliminar.php"
                        onsubmit="return confirm('¿Deseas eliminar este libro?');">

                        <input type="hidden" name="id" value="<?php echo $libro['id_libro']; ?>">

                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>