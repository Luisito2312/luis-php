<?php

    const HABITACIONES =
    [
        13 => ["nombre" => "Cripta del rey", "precio" => 120, "capacidad" => 2, "estado" => "Disponible"],
        66 => ["nombre" => "Laboratorio secreto", "precio" => 80, "capacidad" => 3, "estado" => "Disponible"],
        99 => ["nombre" => "Sarcofago imperial", "precio" => 150, "capacidad" => 2, "estado" => "Disponible"],
        404 => ["nombre" => "Suite fantasmal", "precio" => 200, "capacidad" => 4, "estado" => "Disponible"],
        666 => ["nombre" => "Guarida del hombre lobo", "precio" => 60, "capacidad" => 1, "estado" => "Disponible"]
    ];

    function calcularEstancia(float $precio, int $noche): float|false
    {
        if (($precio <= 0) || ($noche <= 0)):
            return false ;
        else :
            return $precio*$noche;  
        endif;

    }

    function mostrarHabitaciones() : void
    {
        foreach(HABITACIONES as $numero => $habitacion):

            echo "<tr>";
            echo "<td>$numero</td>";
            echo "<td>{$habitacion["nombre"]}</td>";
            echo "<td>{$habitacion["precio"]}</td>";
            echo "<td>{$habitacion["capacidad"]}</td>";
            echo "<td>{$habitacion["disponible"]}</td>";
            echo "<td><input type=\"radio\" name=\"habitacion_id\" value=\"$numero\" required></td>";
            echo "</tr>";
        endforeach;
    }

    function devolverHabitacion()
    {

    }


?>