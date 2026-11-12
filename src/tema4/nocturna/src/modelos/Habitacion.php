<?php

class Habitacion
{
  # Atributos
  public readonly int $numero;
  private string $nombre;

  # Propiedad controlada por hook de escritura
  public float $precio {
    set {
      if ($value <= 0):
        throw new InvalidArgumentException("El precio por noche debe ser mayor de 0");
      endif;

      $this->precio = $value;
    }
  }

  # Propiedad controlada por hook de escritura
  public int $capacidad {
    set {
      if ($value < 1):
        throw new InvalidArgumentException("El numero de huespedes debe ser mayor de 0");
      endif;

      $this->capacidad = $value;
    }
  }
  private bool $disponible;

  public function __construct(int $num, string $nombre, float $precio, int $capacidad)
  {
    $this->numero = $num;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->capacidad = $capacidad;
    $this->disponible = true;
  }

  # getters
  public function getNombre(): string
  {
    return $this->nombre;
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

  # Metodo que devuelve la representacion de html de una habitacion
  public function devolverHabitacion(): string
  {
      $estadoTexto = $this->disponible ? "Disponible" : "Ocupada";    

      return "<h3> Habitacion $this->numero - $this->nombre </h3>
              </br><p> Precio por noche: $this->precio</p>
              <p>Capacidad: $this->capacidad huespedes</p>
              <p>Estado: $estadoTexto</p>";
  }
}