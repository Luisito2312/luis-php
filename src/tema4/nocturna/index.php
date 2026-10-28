<?php 

require_once "nocturna.php";

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