<?php

namespace LostSignal\Factorias;

use LostSignal\Modelos\Senal;

abstract class SenalFactory {
    public static function crear(array $datos) : Senal
    {
        $senal = new Senal;
        $senal->setCodigo((string)$datos['codigo']);
        $senal->estacion = (string) $datos['estacion'];
        $senal->frecuencia =(float) $datos['frecuencia'];
        $senal->intensidad =(int) $datos['intensidad'];

        return $senal;

    }
}