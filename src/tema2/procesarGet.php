<?php

$nombre = $_GET["nombre"];
// $edad = $_GET["edad"];

$edad = $_GET["edad"]??"-";

echo "Te llamas ". $nombre . " y tienes ". $edad . " años";