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
            <label for="numero1" class="form-label">Introduce un numero</label>
            <input type="number" class="form-control" id="numero1" name="numero1">
        </div>
        
        <div class="mb-5">
            <label for="numero2" class="form-label">Introduce un numero</label>
            <input type="number" class="form-control" id="numero2" name="numero2">
        </div>

        <button type="submit" class="btn btn-primary">Multiplicar</button>
    </form>

    <?php 

    if(!empty($_GET["numero1"]) && !empty($_GET["numero2"])):
        $numero1 = $_GET["numero1"];
        $numero2 = $_GET["numero2"];

    ?>
    <div class="mb-5">
        <p><?= $numero1 * $numero2 ?></p>
    </div>
    <? endif; ?>
</body>