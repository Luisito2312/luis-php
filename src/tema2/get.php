<!DOCTYPE html>
<html lang=>
    <head>
        <title>protocolo GET</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <form action="procesarGet.php" method="get">

            <label for="nombre"> Escribe tu nombre: </label>
            <input type="text" name="nombre" id="nombre" required/>

            <br/>

            <label for="edad"> Escribe tu edad: </label>
            <input type="number" name="edad" id="edad" required/>

            <button type="submit">Enviar</button>

        </form>
    </body>
</html>