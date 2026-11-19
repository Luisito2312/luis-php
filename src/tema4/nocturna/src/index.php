<?php
    require_once __DIR__  ."/vendor/autoload.php";

    use Nocturna\Controladores\HabitacionController;
    use Nocturna\Repositorios\HabitacionRepositorio;
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;

    $repo = new HabitacionRepositorio();
    $habitaciones = $repo->getAll();

    $loader = new FilesystemLoader(__DIR__ . '/Vistas');
    $twig = new Environment($loader);

    echo $twig->render('lista_habitaciones.html.twig', [
        'habitaciones' => $habitaciones,
    ]);

    const RUTAS = [
        "habitacion-indice" => [HabitacionController::class, "indice"],
        "habitacion-borrar" => [HabitacionController::class, "borrar"],
    ];

    $filtrado = function($valor)
    {
        return $valor;
    };

    // $parametros = array_filter( $_GET, fn($clave) => strtolower($clave) != ) ;

    #Recuperamos el controlador y la accion a realizar
    $accion = $_GET["accion"]??"habitacion-indice";

    #Recuperamos el controlador y el nombre del metodo a ejecutar
    // $control = RUTAS["accion"]??" null";



    # Si no hemos encontrado la accion y/o el controlador enviamos codigo de error
    if($control === null):
        http_response_code(404);
        exit("Pagina no encontrada");
    endif;
    
?>