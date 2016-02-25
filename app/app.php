<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Cuisine.php";
    require_once __DIR__."/../src/Restaurant.php";
    require_once __DIR__."/../src/RestaurantReview.php";

    $app = new Silex\Application();

    $server = 'mysql:host=localhost;dbname=cuisine';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

//GETTERS
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
    });

//POSTERS
    $app->post("/cuisines", function() use ($app){
        $cuisine = new Cuisine($_POST['name']);
        $cuisine->save();
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/delete_cuisines", function() use ($app) {
        Cuisine::deleteAll();
        return $app['twig']->render('index.html.twig');
    });



    return $app;
?>
