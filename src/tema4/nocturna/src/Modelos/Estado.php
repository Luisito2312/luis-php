<?php

namespace Nocturna\Modelos;

enum Estado: int
{
    case DISPONIBLE = 1;
    case OCUPADA = 0;

    public function texto(): string
    {
        return match ($this) {
            self::DISPONIBLE => 'Libre',
            self::OCUPADA => 'Reservada',
        };
    }
}