<?php

namespace LostSignal\Modelos;

use InvalidArgumentException;
use LostSignal\Modelos\Estado;

class Senal
{
    // Atributos 
    public readonly ?int $identificador;
    public private(set) string $codigo;
    public Estado $estado = Estado::PENDIENTE {
        get => $this->estado;
        set(Estado|string $value) {
            $this->estado = is_string($value) ? Estado::from($value) : $value;
        }
    }

    public string $estacion {
        get => $this->estacion;
        set {
            if(trim($value) === ''):
                throw new InvalidArgumentException("La estacion no puede estar vacia");
            endif;
            $this->estacion = $value;  
        }
    }

    public float $frecuencia {
        get => $this->frecuencia;
        set {
            if ($value <= 0):
                throw new InvalidArgumentException("La frecuencia debe ser mayor a 0");
            else:
                $this->frecuencia = $value;
            endif;
        }
    }

    public int $intensidad {
        get => $this->intensidad;
        set {
            if (($value < 1) || ($value > 100)):
                throw new InvalidArgumentException("La intensidad debe ser un numero comprendido entre 1 y 100");
            else:
                $this->intensidad = $value;
            endif;
        }
    }

    public bool $prioritaria {
        get => $this->intensidad >= 80;
    }

    // Constructor
    public function __construct()
    {
    }

    public function setCodigo(string $codigo) : void
    {
        $this->codigo = $codigo;
    }
}