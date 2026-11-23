<?php

    namespace Objeto\Controladores;

use Override;

    class ObjetoController extends BaseController {

        public function indice() : void
        {
            $this->render('buscador-objetos.html.twig', 
            [
                'objetos' => [],
                'busqueda' => false,
                'error' => null
            ]);
        }
    }