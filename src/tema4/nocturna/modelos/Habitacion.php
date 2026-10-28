<?php

    class Habitacion
    {
        # Atributos
        private int $numero;
        private string $nombre;
        private float $precio;
        private int $capacidad;
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
        public function getNombre() : string
        {
            return $this->nombre;
        }
    }