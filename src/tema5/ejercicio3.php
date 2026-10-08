<?php

if (!empty($_COOKIE)):
    $nombre = $_COOKIE["usuario"];
    $tema = $_COOKIE["tema"];
else:
    $nombre = $_POST["usuario"]??"";
    $tema = $_POST["tema"]??"";

    if (!empty($nombre) and !empty($tema)):

        setcookie("usuario", $nombre, time() + (60 * 60 * 24 * 30));
        setcookie("tema", $tema, time() + (60 * 60 * 24 * 30));

    endif;
endif;
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .claro {
            background-color: white;
            color: black;
        }

        .oscuro {
            background-color: black;
            color: white;
        }

        .frio {
            background-color: lightblue;
            color: black;
        }

        .calido {
            background-color: lightyellow;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">

        <h3><?= empty($nombre) ? "" : "Bienvenido, $nombre " ?></h3>

        <form class="form-control" method="post" action="ejercicio3.php">
            <label for="usuario">Nombre de usuario</label>
            <input id="usuario" type="text" name="usuario" required autofocus />

            <br />

            <select name="tema">
                <option class="claro" value="claro">Claro</option>
                <option class="oscuro" value="oscuro">Oscuro</option>
                <option class="calido" value="calido">Calido</option>
                <option class="frio" value="frio">Frio</option>
            </select>

            <button class="btn btn-primary">Enviar</button>
        </form>

    </div>
</body>

</html>