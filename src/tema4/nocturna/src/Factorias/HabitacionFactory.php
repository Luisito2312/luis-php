<?php

namespace Nocturna\Factorias;

use Nocturna\Modelos\Habitacion;

class HabitacionFactory
{
    public static function crear(array $datos): Habitacion
    {
        $habitacion = new Habitacion();
        $habitacion->setNumero((int) $datos["numero"]);
        $habitacion->setNombre($datos["nombre"]);
        $habitacion->capacidad = (int) $datos["capacidad"];
        $habitacion->precio_noche = (float) $datos["precio_noche"];
        $habitacion->liberar();

        return $habitacion;
    }
}