<?php

include "funciones.php";
session_start();

$mensaje = "";
$victoria = false;
$juego = true;
$mensaje = "";
$mensajeMayor = "";
$esMayor = "";
$maxPuertas = 3;

// Iniciazlicacion del juego. 
inicializarJuego();

if(isset($_POST["reiniciar"])):
    reiniciarJuego();
endif;

$maxIntentos = 6;



if (isset($_POST["codigoPuerta"])) :

    $pista = obtenerPista($_POST["codigoPuerta"], $_SESSION["codigo"]);

    $victoria = true;


    if ($_SESSION["intentos"] >= $maxIntentos):
        $mensaje = "<div class=\"alert theme-danger\" role=\"alert\">
                            <p>NOOOOOO HAS PERDIDO, Has gastado todos tus intentos.</p>
                        </div>";
        $juego = false;
    else :

        $_SESSION["intentos"]++;

        if ($_SESSION["codigo"] == $_POST["codigoPuerta"]) :

            if($_SESSION["puertaActual"] < $maxPuertas):
                $_SESSION["puertaActual"]++;
                $_SESSION["codigo"] = 1234; //rand(1000, 9999);
                $_SESSION["intentos"] = 0;

                $mensaje = "<div class=\"alert theme-success\" role=\"alert\">
                                <p>¡HAS PASADO LA PUERTA " . ($_SESSION["puertaActual"] - 1) . "! A por la siguiente.</p>
                            </div>";
            else :
                $mensaje = "<div class=\"alert theme-success\" role=\"alert\">
                                <p>HAS GANADO!!! Has abierto las tres puertas de manera satisfactoria.</p>
                            </div>";
            $victoria = true;
            $juego = false;
            endif;

        else :
            $intentosRestantes = $maxIntentos - $_SESSION["intentos"];

            $mensaje = "<div class=\"alert theme-danger\" role=\"alert\">
                                <p>SIGUE INTENTANDOLO!! Te quedan " . $intentosRestantes . " intentos. El numero es " . $pista . " que el codigo de la puerta</p>
                            </div>";
            $victoria = false;
            if ($_SESSION["intentos"] >= $maxIntentos):
                $mensaje = "<div class=\"alert theme-danger\" role=\"alert\">
                            <p>NOOOOOO HAS PERDIDO, Has gastado todos tus intentos.</p>
                        </div>";
                $juego = false;
            endif;
        endif;
    endif;
endif;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>

<body>

    <?php if ($juego): ?>
        <form method="post" action="">

            <div class="mb-3">
                <label for="codigoPuerta" class="form-label">Introduce el código de la puerta</label>
                <input type="number" class="form-control" id="codigoPuerta" name="codigoPuerta" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Desbloquear</button>
        </form>
    <?php endif;

    if ($victoria || $_SESSION["intentos"] >= $maxIntentos): ?>
        <form method="post" action="" class="mb-3">
            <button type="submit" name="reiniciar" class="btn btn-primary">Reiniciar</button>
        </form>
    <?php

    endif;
    ?>


    <?= $mensaje ?>

</body>

</html>