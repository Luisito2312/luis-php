<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio 3</title>
    <meta charset="UTF-8" />

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

    if (isset($_POST["posicion"]) && isset($_POST["diamante"]) && isset($_POST["trampa"])) {
        if ($_POST["posicion"] == $_POST["diamante"]) {
            $victoria = true;
        } elseif ($_POST["posicion"] == $_POST["trampa"]) {
            $derrota = true;
        }
    }

    // Pasar el array ENTERO
    if (isset($_POST["diamante"]) && isset($_POST["trampa"]) && isset($_POST["cofre"]) && $_POST["llave"]) {

        $posiciones[0] = $_POST["diamante"];
        $posiciones[2] = $_POST["trampa"];
        $posiciones[1] = $_POST["cofre"];
        $posiciones[3] = $_POST["llave"];

    } else {

        for ($i = 1; $i <= 4; $i++) {
            do {
                $valor = rand(1, 100);
            } while (in_array($valor, $posiciones));
            $posiciones[] = $valor;
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

            <input type="hidden" name="diamante" value="<?= $posiciones[0]; ?>">
            <input type="hidden" name="trampa" value="<?php echo $posiciones[2]; ?>">
            <input type="hidden" name="cofre" value="<?php echo $posiciones[1]; ?>">
            <input type="hidden" name="llave" value="<?php echo $posiciones[3]; ?>">

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
</body>

</html>