<!DOCTYPE html>
<html lang=>
    <head>
        <title>protocolo POST</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <form action="procesarPost.php" method="post">

            <label for="nombre"> Escribe tu nombre: </label>
            <input type="text" name="nombre" id="nombre" required/>

            <br/>

            <label for="edad"> Escribe tu edad: </label>
            <input type="number" name="edad" id="edad" />

            <button type="submit">Enviar</button>

        </form>
    </body>
</html>