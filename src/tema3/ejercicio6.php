<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>
<body>
    <form method="get">

        <div class="mb-5">
            <label for="horas" class="form-label">Introduce cuantas horas has trabajado</label>
            <input type="number" class="form-control" id="horas" name="horas" required>
        </div>

        <div class="mb-5">
            <label for="divisa" class="form-label">En que divisa deseas cobrar</label>
            <select id="divisa" name="divisa">
                <option value="pesetas">Pesetas</option>
                <option value="dolares">Dolares</option>
                <option value="yen">Yenes</option>
                <option value="libra">Libras</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

    <?php 
        if(isset($_GET["horas"]) && isset($_GET["divisa"])):
            $sueldo = $_GET["horas"] * 12;

            match ($_GET["divisa"]) {
                "pesetas" => $sueldo *= 166.386,
                "dolares" => $sueldo *= 1.05,
                "yen" => $sueldo *= 157.25,
                "libra" => $sueldo *= 0.87
            }
    ?>

    <div class="mb-5">
        <p>Tu sueldo asciende a la friolera de: <?= $sueldo. " ".  $_GET["divisa"]?>  este mes</p>
    </div>
    <? endif; ?>


</body>