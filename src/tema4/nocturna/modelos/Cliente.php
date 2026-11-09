<?php

require_once "Direccion.php";


class Cliente{

    public static int $contador = 0;

    # PROPIEDAD VIRTUAL
    public string $nombreCompleto {
        get => "{$this->nombre} {$this->apellido}";
        set {
            [$this->nombre, $this->apellido] = explode(" ", $value);
        }
    }

    # HOOK LECTURA/ESCRITURA PROPIEDADES
    # Permiten definir de forma precisa el comportamiento de lectura y escritura
    # de la propiedad
    private string $nombre {
        
        get => ucfirst($this->nombre);
        set {
            $this->nombre = strtolower($value);
        }
    }

    private string $apellido;

    /**
     * @param string $dni
     * @param string $nombre
     * @param string $apellido
     */
    public function __construct(private readonly string $dni, string $nombre, string $apellido)
    {
        self::$contador++;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function __tostring(): string
    {
        return "{$this->dni} : {$this->nombreCompleto} <br/>" ;
    }

}