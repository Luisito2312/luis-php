<?php
namespace Nocturna\Controladores;

use Nocturna\Repositorios\HabitacionRepository;
use Nocturna\Modelos\Estado;

class HabitacionController extends BaseController
{
    /**
     * Muestra el panel con todas las habitaciones.
     * @return void
     */
    public function indice(): void
    {
        $habitacionRepository = new HabitacionRepository;
        $habitaciones = $habitacionRepository->getAll();

        $this->render("lista-habitaciones.html.twig", [
            "habitaciones" => $habitaciones,
        ]);
    }

    /**
     * Elimina la habitacion a partir del id 
     * @return void
     */
    public function eliminar(): void
    {
        if (isset($_GET['idHabitacion'])) {
            $idHabitacion = (int) $_GET['idHabitacion'];
            $habitacionRepository = new HabitacionRepository;
            $habitacionRepository->delete($idHabitacion);
        }

        header("Location: index.php");
        exit;
    }

    /**
     * Funcion para editar la habitacion en la base de datos
     * @return void
     */
    public function editar(): void
    {
        if (!isset($_GET['idHabitacion'])) {
            header("Location: index.php");
            exit;
        }

        $id = (int) $_GET['idHabitacion'];
        $habitacionRepository = new HabitacionRepository;
        $habitacion = $habitacionRepository->getbyId($id);

        if (!$habitacion) {
            header("Location: index.php");
            exit;
        }

        $this->render("editar-habitacion.html.twig", [
            "habitacion" => $habitacion,
        ]);
    }

    /**
     * Recrgoe los campos del post y los manda a la funcion editar en un array
     * @return never
     */
    public function actualizar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idHabitacion'])) {
            $datos = [
                "idHabitacion" => (int) $_POST['idHabitacion'],
                "numero" => (int) $_POST['numero'],
                "nombre" => trim($_POST['nombre']),
                "capacidad" => (int) $_POST['capacidad'],
                "precio" => (float) $_POST['precio'],
                "estado" => (int) $_POST['estado']
            ];

            $habitacionRepository = new HabitacionRepository;
            $habitacionRepository->update($datos);
        }

        header("Location: index.php");
        exit;
    }

}