<?php

$nombre = $_POST["nombre"];

$edad = ($_POST["edad"]??"")?: "-";

// $edad = empty($_POST["edad"])?"-":$_POST["edad"];

echo "Te llamas ". $nombre . " y tienes ". $edad . " años";