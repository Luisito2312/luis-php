<?php

trait Jefe {
    protected $decuento;

    public function info() : void {
        echo "Soy un jefe y tengo un descuento vip de ($this->descuento) %<br/>";
    }
}