<?php

// function mensaje($msg, $tipo = "info", $destino = "pantalla")
// {
//     echo "[$tipo] $msg -> destino: $destino </br>"; 
// }

// mensaje("hola"); 
// mensaje("hola", "pitos", "mi cara");

// # Parametros opcionales con nombre
// mensaje ("Actualizacion completada", destino: "log");


// $alumnos = ["paco", "Luis", "pepe", "jose"];

// # FUNCION VARIATICA
// function mostrarNombres(...$nombres): void
// {
//     foreach ($nombres as $item):
//         echo "<p> $item </p>";
//     endforeach;
// }

// mostrarNombres("Jose", "Luis");
// mostrarNombres("Jose", "Luis", "mi prima");

# FUNCIONES QUE ACABAN LA EJECUCION DEL SCRIPT (never)
// function redirigir(string $urlArchivo): never
// {
//     header("location : $urlArchivo");
//     exit();
// }

// function obtenerDescuento(float $precio, ?bool $registrado)
// {
//     if ($registrado == null) return null;
//     return $registrado ? $precio * 0.9 : $precio;
// }

// FUNCIONES PARA EL JUEGO DEL ESCAPE ROOM
function inicializarJuego(): void
{
    if (!isset($_SESSION["puertaActual"])):
        $_SESSION["puertaActual"] = 1;
    endif;

    if (!isset($_SESSION["codigo"])):
        $_SESSION["codigo"] = 1234;  //rand(1000, 9999);

    endif;

    if (!isset($_SESSION["intentos"])):
        $_SESSION["intentos"] = 0;

    endif;
}

function reiniciarJuego(): void
{
    if (isset($_POST["reiniciar"])):
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    endif;
}

function obtenerPista(int $codigoIntroducido, int $codigoPuerta) : String
{
    if ($codigoIntroducido < $codigoPuerta):
        $mensajeMayor = "mayor";
    else :
        $mensajeMayor = "menor";
    endif;

    return $mensajeMayor;
}

function comprobarIntentoPuerta(int $codigoIngresado, int $maxIntentos, int $maxPuertas)
{
    if($codigoIngresado == $_SESSION["codigo"]):

        if($_SESSION["puertaActual"] < $maxPuertas):
            $puertaAnterior = $_SESSION["puertaActual"];
            $_SESSION["puertaActual"]++;
            $_SESSION["codigo"] = 1234; //rand(1000, 9999);
            $_SESSION["intentos"] = 0;

            return [
                "estado" => "acertado",
                "puertaAnterior" => $puertaAnterior
            ];
        else : 
            return [
                "estado" => "victoria"
            ];
        endif;

    else: 
        $_SESSION["intentos"]++;

        if($_SESSION["intentos"] >= $maxIntentos):
            return [
                "estado" => "derrota"
            ];
        else :
            return [
                "estado" => "fallo",
                "pista" => obtenerPista($codigoIngresado, $_SESSION["codigo"])
            ];
        endif;
    endif;
}

