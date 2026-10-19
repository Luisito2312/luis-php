<?php

// function mensaje($msg, $tipo = "info", $destino = "pantalla")
// {
//     echo "[$tipo] $msg -> destino: $destino </br>"; 
// }

// mensaje("hola"); 
// mensaje("hola", "pitos", "mi cara");

// # Parametros opcionales con nombre
// mensaje ("Actualizacion completada", destino: "log");


$alumnos = ["paco", "Luis", "pepe", "jose"];

# FUNCION VARIATICA
function mostrarNombres(...$nombres): void
{
    foreach ($nombres as $item):
        echo "<p> $item </p>";
    endforeach;
}

mostrarNombres("Jose", "Luis");
mostrarNombres("Jose", "Luis", "mi prima");

# FUNCIONES QUE ACABAN LA EJECUCION DEL SCRIPT (never)
function redirigir(string $urlArchivo) : never
{
    header("location : $urlArchivo");
    exit() ;
}

function obtenerDescuento( float $precio, ?bool $registrado)
{
    if ($registrado == null) return null;
    return $registrado? $precio * 0.9 : $precio;
}

echo obtenerDescuento(100, false);
echo obtenerDescuento(100, true);
echo obtenerDescuento(100, null);