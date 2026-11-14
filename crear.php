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

    <title>Registrar Libro</title>
</head>

<body>
    <h1>Registrar Libro</h1>
    <form method="post" action="guardar.php">
        <label>Título de Libro</label>
        <input type="text" name="titulo" placeholder="Escribe tu Título Aqui">
        <label>Isbn de LIbro</label>
        <input type="text" name="isbn" placeholder="Escribe el isbn del Libro">
        <label>Año de libro</label>
        <input type="number" name="ano_publicacion" placeholder="Escribe el Año del libro">
        <label>Idioma del libro</label>
        <input type="text" name="idioma" placeholder="Escribe eL Idioma del Libro">
        <label>Paginas del Libro</label>
        <input type="number" name="numero_paginas" placeholder="Ingrese el Numero de Paginas del Libro">
        <button type="submit">Registrar Libro</button>
    </form>
</body>

</html>