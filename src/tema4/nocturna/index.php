<?php

require_once "nocturna.php";
require_once "modelos/Habitacion.php";

if ($_POST):

    $huesped = $_POST["huesped"];
    $precio = $_POST["precio"];
    $noches = $_POST["noches"];

    # Calculamos el precio por la estancia 
    $precio = calcularEstancia($precio, $noches);

endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel nocturna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL"
        crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <div class="izquierda">
            <h3>Habitaciones</h3>
            <table>
                <thead>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Capacidad</th>
                </thead>
                <tbody>
                    <?php mostrarHabitaciones(); ?>
                </tbody>
            </table>
        </div>


        <div class="derecha">
            <div class="">

            </div>
        </div>


        <form action="index.php" method="post">
            <label for="huesped">Nombre del huesped</label>
            <input type="text" name="huesped" id="huesped" required autofocus>

            </br>

            <label for="precio">Precio por noche</label>
            <input type="text" name="precio" id="precio" required autofocus>

            </br>

            <label for="noches">Numero de noches</label>
            <input type="text" name="noches" id="noches" required autofocus>

            <button type="submit" name="enviar">Enviar</button>



        </form>
    </div>

</body>

</html>