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
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            $fondo = true;
            # posiciones [tesoro, trampa, cofre, llave]
            $posiciones = [];
            $victoria = false;

            # Dibujar tablero
            for ($i = 1; $i <= 4; $i++) {
                do {
                    $valor = rand(1, 100);
                } while (in_array($valor, $posiciones));

                $posiciones[] = $valor;
            }

            for ($i = 1; $i <= 100; $i++) {

                // $clase = ($i % 2 == 0) ? "par" : "impar";
                // printf("<td class=\"%s\">%03d</td>\n", $clase, $i);
                $valor = str_pad($i, 3, 0, STR_PAD_LEFT);

                $valor = match (array_search($i, $posiciones)) {
                    0 => "💎",
                    1 => "🔑",
                    2 => "🧨",
                    3 => "🔒",
                    default => str_pad($i, 3, 0, STR_PAD_LEFT)
                };

                echo "<td class=\"" . (($i % 2 == 0) ? "par" : "impar") . " " . (($fondo) ? "fondo" : "") . "\">$valor </td>";

                $fondo = !$fondo;

                if ($i % 10 == 0) {
                    echo "</tr>\n" . (($i != 100) ? "<tr>" : "");
                    $fondo = !$fondo;
                }
            }
            ?>
    </table>
    <form action="tesoro.php" method="get">
        <label for="posicion">Introduce la posicion del tesoro.</label>
        <input type="number" name="posicion" id="posicion" min="1" max="100" autofocus required/>
        <button>Enviar</button>
    </form>
    <?php
        if ($_GET["posicion"] == $posiciones[0]) {
            echo "Enhorabuena, has encontrado el tesoro";
        } else {
            echo "No has encontrado el tesoro";
        }
    ?>

</body>

</html>