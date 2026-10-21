<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>

<body>

    <form method="get">

        <div class="mb-3">
            <label for="nombre" class="form-label">Introduzca su nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Introduzca su apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
        </div>

        <button type="submit">Enviar</button>
    </form>

    <?php
        if (isset($_GET["nombre"]) && isset($_GET["apellido"])):
            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];
    ?>
    <div class="alert theme-primary" role="alert">
        <p>Su nombre es: <?= $nombre ?> y su apellido es: <?= $apellido ?></p>
    </div>
    <?php endif; ?>
</body>