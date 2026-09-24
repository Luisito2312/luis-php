<?php
const IVA = 0.21;
$precio = 100;

$total = $precio + $precio* IVA;
echo "El precio total es: ".$total;