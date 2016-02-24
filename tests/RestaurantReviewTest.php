<!-- testing with php unit, use this template for guidance -->
<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Cuisine.php';
    require_once __DIR__ . '/../src/Restaurant.php';
    require_once __DIR__ . '/../src/RestaurantReview.php';

    $server = 'mysql:host=localhost;dbname=cuisine_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

    class TestRestaurantReview extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        // {
        //     Restaurant::deleteAll();
        //     RestaurantReview::deleteAll();
        // }

        function test_getReview()
        {
            //Arrange
            $name = "Russian Cuisine";//CUISINE
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';//RESTAURANT
            $description = 'Delicious Russian food soaked in vodka';
            $cuisine_id = $test_myCuisine->getID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id, $description);
            $test_myRestaurant->save();

            $review = "yum-tastic";//this is a Review
            $res_id = $test_myRestaurant->getID();
            $test_myReview = new RestaurantReview($review, $id, $res_id);
            $test_myReview->save();

            //Act
            $result = $test_myReview->getReview($review);

            //Assert
            $this->assertEquals($review, $result);

        }
    }
?>
