<?php

namespace Nocturna\Modelos;

class Habitacion
{
    # Atributos
    public private(set) int $numero;
    public private(set) string $nombre;

    public Estado $estado = Estado::DISPONIBLE {
        set(Estado|int $value) {
            if (is_int($value)):
                $this->estado = ($value == 1) ? Estado::DISPONIBLE : Estado::OCUPADA;
            else:
                $this->estado = $value;
            endif;
        }
    }

    # Hook virtual para mapear la columna 'disponible' de la BD hacia '$this->estado'
    public int|bool $disponible {
        get => $this->estado === Estado::DISPONIBLE;
        set => $this->estado = ($value == 1) ? Estado::DISPONIBLE : Estado::OCUPADA;
    }

    # Propiedad controlada por hook de escritura
    public float $precio_noche {
        get => $this->precio_noche;
        set {
            if ($value <= 0):
                throw new \InvalidArgumentException("El precio por noche debe ser mayor de 0");
            else:
                $this->precio_noche = $value;
            endif;
        }
    }

    # Propiedad controlada por hook de escritura
    public int $capacidad {
        get => $this->capacidad;
        set {
            if ($value < 1):
                throw new \InvalidArgumentException("El numero de huespedes debe ser mayor de 0");
            else:
                $this->capacidad = $value;
            endif;
        }
    }

    public function __construct()
    {}

    # Getters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCapacidad(): int
    {
        return $this->capacidad;
    }

    public function isDisponible(): bool
    {
        return $this->estado === Estado::DISPONIBLE;
    }

    # Métodos para controlar el estado
    public function ocupar(): void
    {
        $this->estado = Estado::OCUPADA;
    }

    public function liberar(): void
    {
        $this->estado = Estado::DISPONIBLE;
    }

    # Setters
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
}