<?php

namespace LostSignal\Repositorios;

use LostSignal\Modelos\Estado;
use LostSignal\Modelos\Senal;
use LostSignal\Config\Database;

 class SenalRepository {
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::conexion();
    }

    public function obtenerTodas(): array
    {
        $resultado = $this->pdo->query("SELECT * FROM senal;");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Senal::class);
    }

    public function guardar(array $datos): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO senal (codigo, estacion, frecuencia, intensidad, estado) VALUES (:codigo, :estacion, :frecuencia, :intensidad, :estado)");

        $stmt->execute([
            ":codigo" => $datos['codigo'],
            ":estacion" => $datos['estacion'],
            ":frecuencia" => $datos['frecuencia'],
            ":intensidad" => $datos['intensidad'],
            ":estado" => $datos['intensidad']
        ]);
        
    }

    public function buscar(int $id) : ?Senal
    {
        $stmt = $this->pdo->prepare("SELECT * FROM senal WHERE identificador = :identificador;");

        $stmt->execute([
            ":identificador" => $id
        ]);

        $senal = $stmt->fetchObject(Senal::class);

        return $senal ?: null;
    }

    public function confirmar(int $id) : bool
    {
        $stmt = $this->pdo->prepare("UPDATE senal SET estado = :estado WHERE identificador = :identificador;");

        return $stmt->execute([
            ":estado" => Estado::CONFIRMADA ->value,
            ":identificador" => $id
        ]);

    }

    public function descartada(int $id) : bool
    {
        $stmt = $this->pdo->prepare("UPDATE senal SET estado = :estado WHERE identificador = :identificador;");

        return $stmt->execute([
            ":estado" => Estado::DESCARTADA ->value,
            ":identificador" => $id
        ]);
    }

    public function obtenerPorEstado(Estado $estado) : array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM senal WHERE estado = :estado;");

        $stmt->execute([
            ":estado" => $estado->value
        ]);

        $senal = $stmt->fetchAll(\PDO::FETCH_CLASS, Senal::class);

        return $senal;

    }


 }