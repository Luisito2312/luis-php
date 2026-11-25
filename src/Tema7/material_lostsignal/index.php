<?php

require_once __DIR__ . '/Config/Database.php';
require_once __DIR__ . '/Modelos/Estado.php';
require_once __DIR__ . '/Modelos/Senal.php';
require_once __DIR__ . '/Factorias/SenalFactory.php';
require_once __DIR__ . '/Repositorios/SenalRepository.php';

use LostSignal\Factorias\SenalFactory;
use LostSignal\Modelos\Estado;
use LostSignal\Repositorios\SenalRepository;

$mensaje = null;
$error = null;
$senales = [];
$filtroEstado = $_GET['estado'] ?? '';
$repositorio = null;

try {
    $repositorio = new SenalRepository;

    if($_SERVER['REQUEST_METHOD'] === 'POST'):
        $accion = $_POST['accion'] ?? '';

        if($accion === 'crear') :
            $nuevaSenal = SenalFactory::crear([
                'codigo' => $_POST['codigo'] ?? '',
                'estacion' => $_POST['estacion'] ?? '',
                'frecuencia' => $_POST['frecuencia'] ?? 0,
                'intensidad' => $_POST['intensidad'] ?? 0
            ]);

            $repositorio->guardar($nuevaSenal);
            $mensaje = "Señal registrada correctamente";
            
        elseif($accion === 'confirmar' && isset($_POST['id'])):
            $repositorio->confirmar((int) $_POST['id']);
            $mensaje = "Señal actualizada a confirmada";

        elseif($accion === 'descartar' && isset($_POST['id'])):
            $repositorio->descartada((int) $_POST['id']);
            $mensaje = "Señal descartada correctamente";

        endif;
    endif;
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lost Signal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <h1 class="mb-4">LostSignal</h1>
    <?php if ($mensaje): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Listado de todas las señales -->
    <main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3 mb-0">Listado de señales</h1>
    </div>

    <div class="card card-nocturna shadow-lg">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-dark table-hover table-nocturna align-middle mb-0" id="tablaHabitaciones">
            <thead>
              <tr class="text-uppercase small text-secondary">
                <th class="ps-4 py-3">Codigo</th>
                <th class="py-3">Estacion</th>
                <th class="py-3">Frecuencia</th>
                <th class="py-3">Intensidad</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

    <!-- Formulario para añadir señan -->
    <h3>Añadir nueva señal</h3>
    <form action="index.php" method="POST" class="row">
        <input type="hidden" name="accion" value="crear">

        <div class="col-md-3">
            <label>Codigo: </label>
            <input type="text" name="codigo" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label>Estacion: </label>
            <input type="text" name="estacion" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label>Frecuencia: </label>
            <input type="number" name="frecuencia" class="form-control" required>
        </div>

        <div class="col-md-3">
            <label>Intensidad: </label>
            <input type="number" name="intensidad" class="form-control" required>
        </div>

        <div class="col-md-2">

        </div>

    </form>
    
  </body>
</html>