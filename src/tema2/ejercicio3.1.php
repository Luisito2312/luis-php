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
            background-color: #dddedd;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            for ($i = 1; $i <= 100; $i++) {
                $clase = ($i % 2 == 0) ? "par" : "impar";
                printf("<td class=\"%s\">%03d</td>\n", $clase, $i);

                if ($i % 10 == 0) {
                    echo "</tr>\n" . (($i != 100) ? "<tr>" : "");
                }
            }
            ?>
    </table>


</body>

</html>