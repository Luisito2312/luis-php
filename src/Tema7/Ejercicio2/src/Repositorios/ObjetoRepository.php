<?php

    namespace Objeto\Repositorios;

    use Objeto\Config\Database;
    use Objeto\Modelos\Objeto;

    use PDO;

    class ObjetoRepository {
        private PDO $pdo;

        public function __construct()
        {
            $this->pdo = Database::conexion();
        }

        /**
         * Recupera todos los objetos de la base de datos
         * @return array
         */
        public function getAll() : array
        {
            $resultado = $this->pdo->query("SELECT * FROM oficina");
            return $resultado->fetchAll(PDO::FETCH_CLASS, Objeto::class);

        }

        /**
         * Funcion que busca por el numero de identificador
         * @param int $id
         * @return bool|object
         */
        public function buscarPorIdentificador(int $id) : Objeto
        {
            $sql = "SELECT * FROM oficina WHERE identificador = :identificador;";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ":identificador" => $id
            ]);

            $objeto = $stmt->fetchObject(Objeto::class);
            return $objeto;
        }


    }