<?php

$clases = [
    "profesores" => [ 
        "Pedro perez", "Gema Gomez"
    ],

    "cursos" =>[
        "Biologia", "Quimica"
    ]
];

echo "<pre>". print_r($clases, true) ."</pre>";

$clases["cursos"][0] = "Fisica"; 

echo "<pre>". print_r($clases, true) ."</pre>";