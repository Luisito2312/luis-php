<?php

namespace Nocturna\Controladores;

use Nocturna\Repositorios\HabitacionRepositorio;

class HabitacionController
{
    public function indice(): void
    {
        $repo = new HabitacionRepositorio();
        $habitaciones = $repo->getAll();

        require_once "./Vistas/lista_habitaciones.php";

    }
}