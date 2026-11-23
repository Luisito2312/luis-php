<?php
namespace Nocturna\Repositorios;

use Nocturna\Config\Database;
use Nocturna\Modelos\Habitacion;

class HabitacionRepository
{

    private \PDO $pdo;

    /**
     * Obtiene la conexión PDO compartida.
     */
    public function __construct()
    {
        $this->pdo = Database::conexion();
    }

    /**
     * Recupera todas las habitaciones de la base de datos.
     * @return Habitacion[] Listado de habitaciones
     */
    public function getAll(): array
    {
        $resultado = $this->pdo->query("SELECT * FROM habitacion ;");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Habitacion::class);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM habitacion WHERE idHabitacion = :idHabitacion;");

        $stmt->execute([
            ":idHabitacion" => $id
        ]);

        return $stmt->rowCount() > 0;
    }

    /**
     * Sacar una habitacion a partir del id
     * @param int $id
     * @return bool|object|null
     */
    public function getbyId(int $id): ?Habitacion
    {
        $stmt = $this->pdo->prepare("SELECT * FROM habitacion WHERE idHabitacion = :idHabitacion;");

        $stmt->execute([
            ":idHabitacion" => $id,
        ]);

        $habitacion = $stmt->fetchObject(Habitacion::class);

        return $habitacion ?: null;
    }

    /**
     * Actualizar las habitaciones de la base de datos
     * @param array $datos
     * @return bool
     */
    public function update(array $datos): bool
    {
        $sql = "UPDATE habitacion SET numero = :numero, nombre = :nombre, capacidad = :capacidad, precio = :precio, estado = :estado
                WHERE idHabitacion = :idHabitacion ;";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ":idHabitacion" => $datos["idHabitacion"],
            ":numero" => $datos["numero"],
            ":nombre" => $datos["nombre"],
            ":capacidad" => $datos["capacidad"],
            ":precio" => $datos["precio"],
            ":estado" => $datos["estado"]

        ]);
    }

}