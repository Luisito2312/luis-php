<?php

namespace Nocturna\Repositorios;

use Nocturna\Factorias\HabitacionFactory;
use Nocturna\Modelos\Habitacion;
use Nocturna\Bd\Database;

class HabitacionRepositorio
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::conexion();
    }

    /**
     * @return Habitacion[]
     */
    public function getAll(): array
    {
        $habitaciones = [];
        $resultado = $this->pdo->query("SELECT * FROM habitacion;");

        while ($fila = $resultado->fetch(\PDO::FETCH_ASSOC)) {
            $habitacion = HabitacionFactory::crear($fila);

            if (!$fila['disponible']) {
                $habitacion->ocupar();
            }

            $habitaciones[] = $habitacion;
        }

        return $habitaciones;
    }
}