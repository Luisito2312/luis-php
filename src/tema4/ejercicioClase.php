<?php

# Almacena convenientemente la siguiente lista de alumnos y notas:
#
# Laura     : 8.5
# Pedro     : 4.0
# Marta     : 6.5
# Sergio    : 3.0
# Carlos    : 5.0
# Elena     : 0.2
# David     : 9.2
# Ana       : 7.0
# Pablo     : 4.8
# Lucia     : 10
#
# APARTADO 1: 
# Crea una constante NOTA_CORTE = 5.0
# Utiliza array_filter con un cierre que permita obtener un nuevo array unicamente con los alumnos
# que superen la nota de corte. PISTA: Investiga uso de la instruccion use.
#
# APARTADO 2:
# Crea una constante PUNTOS_EXTRA = 1.0
# Aplica un array_map sobre el array original con una funcion anonima que devuelva un nuevo
# array donde la nota de cada alumno tenga sumada esa bonificacion.
#
# APARTADO 3:
# Utiliza array_reduce con una funcion anonima para calcular la suma total de todas las notas
# de la lista original de alumnos.
#
# APARTADO 4:
# Crea una funcion llamada contarSegunCriterior que reciba dos parametros: la lista de alumnos
# original y una funcion anonima o callable.
# La funcion contarSegunCriterior debera aplicar la funcion a cada alumno y devolver cuantos
# cumplen la condicion impuesta en el cierre. 
#
#Comprueba las siguientes condiciones:
# a. Alumnos con nota sobresaliente (>=9)
# b. Alumnos en estado critico (> 4)
# c. Alumnos con un nombre de mas de 4 caracteres
# d. Alumnos cuyo nombre empiece por P.

const PUNTOS_EXTRA = 1.0;

$notaCorte = 5.0;

$alumnos = [
    "Laura" => 8.5,
    "Pedro" => 4.0,
    "Marta" => 6.5,
    "Sergio" => 3.0,
    "Carlos" => 5.0,
    "Elena" => 0.2,
    "David" => 9.2,
    "Ana" => 7.0,
    "Pablo" => 4.8,
    "Lucia" => 10
];


# APARTADO NUMERO 1
$arrayAprobados = array_filter($alumnos, function ($nota) use ($notaCorte) {
    return $nota >= $notaCorte;
});

var_dump($arrayAprobados);

# APARTADO NUMERO 2

function sumarPunto(array $alumnos, float $puntoExtra) : void
{
    foreach ($alumnos as $nota) {
        $nota += $puntoExtra;
    }
}
$arrayPuntoExtra = array_map(function($nota) use ($PUNTOS_EXTRA){
    return $nota + $PUNTOS_EXTRA;
}, $alumnos);
var_dump($alumnos);




