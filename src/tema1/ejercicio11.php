<?php
$colores = ["rojo", "verde", "azul"];

$colores[] = "amarillo";

echo "<pre>". print_r($colores ,true). "</pre>";

$colores[1] = "morado";

echo "<pre>". print_r($colores ,true). "</pre>";