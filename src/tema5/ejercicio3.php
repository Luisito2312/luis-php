<?php
// Eliminar las cookies si se solicita restablecer preferencias
if (isset($_POST["borrar"])) {
    setcookie("usuario", "", time() - 3600);
    setcookie("tema", "", time() - 3600);
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

$nombre = "";
$tema = "claro";

// Comprobar si existen las cookies o si se enviaron datos por POST
if (!empty($_COOKIE["usuario"]) && !empty($_COOKIE["tema"])) {
    $nombre = $_COOKIE["usuario"];
    $tema = $_COOKIE["tema"];
} elseif (!empty($_POST["usuario"]) && !empty($_POST["tema"])) {
    $nombre = $_POST["usuario"];
    $tema = $_POST["tema"];

    // Guardar cookies durante 30 días
    setcookie("usuario", $nombre, time() + (60 * 60 * 24 * 30));
    setcookie("tema", $tema, time() + (60 * 60 * 24 * 30));
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .claro {
            background-color: #F5F7F6;
            color: #1F2933;
        }

        .oscuro {
            background-color: #1E2723;
            color: #E8F0EC;
        }

        .calido {
            background-color: #FFF1DC;
            color: #653C20;
        }

        .frio {
            background-color: #E8F3F8;
            color: #193A4A;
        }

        body {
            min-height: 100vh;
            padding-top: 2rem;
        }
    </style>
</head>

<body class="<?= htmlspecialchars($tema) ?>">
    <div class="container">

        <?php if (!empty($nombre)): ?>
            <h3>Bienvenido, <?= htmlspecialchars($nombre) ?></h3>
            <form method="post" class="mb-3">
                <button type="submit" name="borrar" class="btn btn-danger btn-sm">Eliminar preferencias</button>
            </form>
        <?php endif; ?>

        <form class="p-4 border rounded bg-transparent" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de usuario</label>
                <input id="usuario" type="text" name="usuario" class="form-control" value="<?= htmlspecialchars($nombre) ?>" required autofocus />
            </div>

            <div class="mb-3">
                <label for="tema" class="form-label">Tema visual</label>
                <select id="tema" name="tema" class="form-select">
                    <option value="claro" <?= $tema === 'claro' ? 'selected' : '' ?>>Claro</option>
                    <option value="oscuro" <?= $tema === 'oscuro' ? 'selected' : '' ?>>Oscuro</option>
                    <option value="calido" <?= $tema === 'calido' ? 'selected' : '' ?>>Cálido</option>
                    <option value="frio" <?= $tema === 'frio' ? 'selected' : '' ?>>Frío</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
</body>

</html>