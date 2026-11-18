<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Nocturna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="bg-dark text-light">

    <!-- Menú Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black bg-opacity-50 border-bottom border-secondary py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="index.php">
                <i class="bi bi-moon-stars-fill text-danger"></i>
                NOCTURNA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNocturna" aria-controls="menuNocturna" aria-expanded="false" aria-label="Mostrar menú">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNocturna">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Habitaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <div class="card bg-dark border-secondary shadow-lg">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tablaHabitaciones" class="table table-dark table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4 py-3">Número</th>
                                <th class="py-3">Habitación</th>
                                <th class="py-3">Capacidad</th>
                                <th class="py-3">Estado</th>
                                <th class="py-3">Precio / Noche</th>
                                <th class="pe-4 py-3 text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($habitaciones as $habitacion): ?>
                                <tr data-estado="<?= $habitacion->isDisponible() ? 'libre' : 'reservada' ?>">
                                    <td class="ps-4 fw-bold"><?= htmlspecialchars($habitacion->numero); ?></td>
                                    <td><?= htmlspecialchars($habitacion->getNombre()); ?></td>
                                    <td><i class="bi bi-people-fill me-1 text-secondary"></i> <?= htmlspecialchars($habitacion->getCapacidad()); ?></td>
                                    <td class="estado-celda">
                                        <span class="badge <?= $habitacion->isDisponible() ? 'bg-success' : 'bg-danger' ?>">
                                            <?= $habitacion->estado->texto(); ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($habitacion->precio_noche); ?> €</td>
                                    <td class="pe-4 text-end">
                                        <button class="btn btn-sm btn-primary me-1" onclick="cambiarEstado(this, 'reservada')" <?= !$habitacion->isDisponible() ? 'disabled' : '' ?>>Reservar</button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="cambiarEstado(this, 'libre')" <?= $habitacion->isDisponible() ? 'disabled' : '' ?>>Liberar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>