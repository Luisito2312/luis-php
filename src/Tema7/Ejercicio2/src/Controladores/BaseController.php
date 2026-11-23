<?php

    namespace Objeto\Controladores;

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;


    abstract class BaseController {
        private Environment $twig;

        public function __construct()
        {
            require_once __DIR__ . "/../vendor/autoload.php";

            $loader = new FilesystemLoader(__DIR__ . '/../Vistas');
            $this->twig = new Environment($loader);
        }

        public function render(string $plantilla, array $datos = []) : void
        {
            echo $this->twig->render($plantilla, $datos);
        }
    }