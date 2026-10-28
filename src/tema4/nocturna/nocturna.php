<?php


    const HABITACIONES =
    [
        13 => ["nombre" => "Cripta del rey", "precio" => 120, "capacidad" => 2, "estado" => true],
        66 => ["nombre" => "Laboratorio secreto", "precio" => 80, "capacidad" => 3, "estado" => true],
        99 => ["nombre" => "Sarcofago imperial", "precio" => 150, "capacidad" => 2, "estado" => true],
        404 => ["nombre" => "Suite fantasmal", "precio" => 200, "capacidad" => 4, "estado" => true],
        666 => ["nombre" => "Guarida del hombre lobo", "precio" => 60, "capacidad" => 1, "estado" => true]
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
            echo "<td>$disponibilidad</td>";
            echo "<td><input type=\"radio\">";
        endforeach;


    }


?>