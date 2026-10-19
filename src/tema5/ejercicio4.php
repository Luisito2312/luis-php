<?php

$mensaje = (empty($_COOKIE["fecha"])) ? "Esta es tu primera visita" : "Ultima conexion: " . $_COOKIE["fecha"] . "\n";

$fechaActual = date('l jS \of F Y h:i:s A');
setcookie("fecha", $fechaActual, time() + (60 * 60 * 24 * 30));

// if (!empty($_COOKIE("fecha"))):
//     $ultimaVez = "Esta es tu primera visita";
// else:
//     $ultimaVez = date('l jS \of F Y h:i:s A') . "\n";
// endif;

?>


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
    <div class="alert theme-accent" role="alert">
        <p><?= $mensaje ?></p>
    </div>
</body>