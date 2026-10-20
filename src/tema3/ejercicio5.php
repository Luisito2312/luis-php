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
            <input type="number" class="form-control" id="horas" name="horas">
        </div>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

    <?php 
        if(isset($_GET["horas"])):
            $sueldo = $_GET["horas"] * 12;
    ?>

    <div class="mb-5">
        <p>Tu sueldo asciende a la friolera de: <?= $sueldo  ?> euros este mes</p>
    </div>
    <? endif; ?>


</body>