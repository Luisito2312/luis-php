<?php

namespace Modelos;

class Habitacion
{
  # Atributos
  public readonly int $numero;
  public  string $nombre;

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

  private bool $disponible;

  # Hacemos los parámetros opcionales para que PDO::fetchObject() pueda instanciarla sin argumentos
  /**
   * 
   * @param int $num
   * @param string $nombre
   * @param float $precio
   * @param int $capacidad
   */
  public function __construct(int $num = 0, string $nombre = "", float $precio = 1, int $capacidad = 1)
  {
    if ($num !== 0) {
      $this->numero = $num;
    }
    $this->nombre = $nombre;
    $this->precio_noche = $precio;
    $this->capacidad = $capacidad;
    $this->disponible = true;
  }

  # getters
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
    return $this->disponible;
  }

  # Metodos para controlar el estado de las habitaciones
  public function ocupar()
  {
    $this->disponible = false;
  }

  public function liberar()
  {
    $this->disponible = true;
  }
}