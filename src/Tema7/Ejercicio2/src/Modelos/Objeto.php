<?php 

    namespace Objeto\Modelos;

    class Objeto {
        // Atributos
        public readonly int $identificador;
        public private(set) string $nombre;
        public string $descripcion;
        public string $lugar;
        public string $fecha;

        // Contrusctor
    //     public function __construct(int $identificador, string $nombre, string $descripcion, string $lugar, string $fecha
    // ) {
    //     $this->identificador = $identificador;
    //     $this->nombre = $nombre;
    //     $this->descripcion = $descripcion;
    //     $this->lugar = $lugar;
    //     $this->fecha = $fecha;
    // }

        // Getters y setters
        public function getIdentificador() : int
        {
            return $this->identificador;
        }

        public function getNombre() : string
        {
            return $this->nombre;
        }

        public function getDescripcion() : string
        {
            return $this->descripcion;
        }

        public function getLugar() : string
        {
            return $this->lugar;
        }

        public function getFecha() : string
        {
            return $this->fecha;
        }

        public function setIdentificador(int $id) 
        {
            $this->identificador = $id;
        }

        public function setNombre(string $nombre)
        {
            $this->nombre = $nombre;
        }


    }