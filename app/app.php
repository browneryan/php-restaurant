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
        //takes us to home page, displays all cuisines
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
    });
//GETTERS RESTAURANTS
    $app->get("/restaurants/{id}", function($id) use ($app){
        $restaurant = Restaurant::find($id);
        var_dump($restaurant);
        return $app['twig']->render("restaurant_information.html.twig", array('restaurant' => $restaurant));
    });

//GETTERS CUISINES
    $app->get("/cuisines/{id}", function($id) use ($app){
      //display all restaurants in one cuisine
      $cuisine = Cuisine::find($id);
      var_dump($cuisine);
      return $app['twig']->render('cuisines.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->findRestaurant_InCuisine()));
    });

//POSTERS CUISINES
    $app->post("/cuisines", function() use ($app){
        //adding cuisines here
        $cuisine = new Cuisine($_POST['name']);
        $cuisine->save();
        return $app['twig']->render('index.html.twig', array('cuisines' => Cuisine::getAll()));
    });

    $app->post("/delete_cuisines", function() use ($app) {
        //deletes all cuisines
        Cuisine::deleteAll();
        return $app['twig']->render('index.html.twig');
    });

//POSTERS RESTAURANTS
    $app->post("/restaurants", function() use ($app) {
      //add a restaurant
        $res_name = $_POST['name'];
        $cuisine_id = $_POST['cuisine_id'];
        $description = $_POST['description'];
        $restaurant = new Restaurant($res_name, $id= null, $cuisine_id, $description);
        $restaurant->save();
        $cuisine = Cuisine::find($cuisine_id);
        var_dump($restaurant);
        return $app['twig']->render('cuisines.html.twig', array('cuisine' => $cuisine, 'restaurants' => $cuisine->findRestaurant_InCuisine()));
    });

    $app->post("/delete_restaurants", function() use ($app) {
        //deletes all restaurants
        Restaurant::deleteAll();
        return $app['twig']->render('cuisines.html.twig');
    });



    return $app;
?>
