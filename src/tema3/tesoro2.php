<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio 3</title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        table {
            border-style: solid;
            border-width: 5px;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
            font-weight: bold;
        }

        .par {
            color: blue;
        }

        .impar {
            color: red;
        }

        .fondo {
            background-color: #6b6b6b;
        }

        form {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <?php
    $fondo = true;
    $posiciones = [];
    $victoria = false;
    $derrota = false;

    // Pasar el array ENTERO
    if (isset($_POST["posiciones"])) {

        $posiciones = $_POST["posiciones"];

    } else {

        for ($i = 1; $i <= 4; $i++) {
            do {
                $valor = rand(1, 100);
            } while (in_array($valor, $posiciones));
            $posiciones[] = $valor;
        }
    }

    if (isset($_POST["posicion"]) && !empty($posiciones)) {
        if ($_POST["posicion"] == $posiciones[0]) {
            $victoria = true;
        } elseif ($_POST["posicion"] == $posiciones[2]) {
            $derrota = true;
        }
    }

    if ($victoria) {
        echo "<h2>¡Enhorabuena, has ganado!</h2>";
    } elseif ($derrota) {
        echo "<h2> ¡Oooooh nooo, has perdido! </h2>";
    } else {
        ?>
        <table>
            <tr>
                <?php
                for ($i = 1; $i <= 100; $i++) {
                    $valor = match (array_search($i, $posiciones)) {
                        0 => "💎",
                        1 => "🗝️",
                        2 => "🧨",
                        3 => "🔒",
                        default => str_pad($i, 3, "0", STR_PAD_LEFT)
                    };

                    echo "<td class=\"" . (($i % 2 == 0) ? "par" : "impar") . " " . (($fondo) ? "fondo" : "") . "\">$valor</td>";
                    $fondo = !$fondo;

                    if ($i % 10 == 0) {
                        echo "</tr>\n" . (($i != 100) ? "<tr>" : "");
                        $fondo = !$fondo;
                    }
                }
                ?>
        </table>

        <form action="tesoro2.php" method="POST">

            <?php foreach ($posiciones as $pos): ?>

                <input type="hidden" name="posiciones[]" value="<?= $pos; ?>">

            <?php endforeach; ?>

            <label for="posicion">Introduce la posicion del tesoro:</label>
            <input type="number" name="posicion" id="posicion" min="1" max="100" autofocus required />
            <button>Enviar</button>
        </form>

        <?php
        if (isset($_POST["posicion"])) {
            echo "<p>No has encontrado el tesoro.</p>";
        }
    }
    ?>
    <form id="recargar" action="tesoro2.php" method="get">
        <button id="recargar"> Reiniciar juego</button>
    </form>
</body>

</html>