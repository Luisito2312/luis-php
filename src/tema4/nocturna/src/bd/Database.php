<?php

namespace Nocturna\Bd;

/**
 * La clase Database implementa un patrón SINGLETON, que garantiza que siempre haya una única instancia
 * de la clase. La clase Database almacenará su propia instancia.
 */
class Database
{
    private const string DATABASE_NAME = "nocturna";
    private const string DATABASE_USER = "root";
    private const string DATABASE_PASS = "root";

    private static ?\PDO $pdo;
    private static ?Database $instancia = null;

    /**
     * @throws \RuntimeException
     */
    private function __construct()
    {
        try {
            $dsn = "mysql:host=db;dbname=" . self::DATABASE_NAME . ";charset=utf8";

            self::$pdo = new \PDO($dsn, self::DATABASE_USER, self::DATABASE_PASS);
        } catch (\PDOException $pdoe) {
            throw new \RuntimeException("**ERROR: No se pudo establecer una conexión con la base de datos.");
        }
    }

    /**
     * Bloqueamos el clonado del objeto
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Bloqueamos la posibilidad de crear varias instancias de la clase
     * @return \PDO
     */
    public static function conexion(): \PDO
    {
        if (self::$instancia == null) {
            self::$instancia = new Database();
        }
        return self::$pdo;
    }

    // public function __destruct()
    // {
    //     $this->pdo = null;
    // }
}