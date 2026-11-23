<?php 

    namespace Objeto\Factorias;
    use Objeto\Modelos\Objeto;

    class ObjetoFactory
    {
        /**
         * 
         * @param array $datos
         * @return Objeto
         */
        public static function crear(array $datos) : Objeto
        {
            $objeto = new Objeto ;
            $objeto->setIdentificador((int) $datos['identificador']);
            $objeto->setNombre($datos['nombre']);
            $objeto->descripcion = $datos['descripicion'];
            $objeto->lugar = $datos['lugar'];
            $objeto->fecha = $datos['fecha'];
            
            return $objeto;
        }
    }