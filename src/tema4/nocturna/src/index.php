<?php
require __DIR__ . "/vendor/autoload.php";

use Nocturna\Controladores\HabitacionController;

$controlador = new HabitacionController;
$accion = $_GET['accion'] ?? 'indice';

match ($accion) {
    'eliminar' => $controlador->eliminar(),
    'editar' => $controlador->editar(),
    'actualizar' => $controlador->actualizar(),
    default => $controlador->indice(),
};