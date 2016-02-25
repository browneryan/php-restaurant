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

        protected function tearDown()
        {
            Restaurant::deleteAll();
            Cuisine::deleteAll();
            RestaurantReview::deleteAll();
        }

        function test_getReview()
        {
            //Arrange
            $name = "Russian Cuisine";//CUISINE
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';//RESTAURANT
            $description = 'Delicious Russian food soaked in vodka';
            $cuisine_id = $test_myCuisine->getCuisineID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id, $description);
            $test_myRestaurant->save();

            $review = "yum-tastic";//this is a Review
            $res_id = $test_myRestaurant->getRestaurantID();
            $test_myReview = new RestaurantReview($review, $id, $res_id);
            $test_myReview->save();

            //Act
            $result = $test_myReview->getReview($review);

            //Assert
            $this->assertEquals($review, $result);
        }

        function test_getID()//get ID of a review!
        {
            //Arrange
            $name = "Russian Cuisine";//CUISINE
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';//RESTAURANT
            $description = 'Delicious Russian food soaked in vodka';
            $cuisine_id = $test_myCuisine->getCuisineID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id, $description);
            $test_myRestaurant->save();

            $review = "yum-tastic";//this is a Review
            $res_id = $test_myRestaurant->getRestaurantID();
            $test_myReview = new RestaurantReview($review, $id, $res_id);
            $test_myReview->save();

            //Act
            $result = $test_myReview->getReviewID($review);

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getResID()
        {
            //Arrange
            $name = "Russian Cuisine";//CUISINE
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';//RESTAURANT
            $description = 'Delicious Russian food soaked in vodka';
            $cuisine_id = $test_myCuisine->getCuisineID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id, $description);
            $test_myRestaurant->save();

            $review = "yum-tastic";//this is a Review
            $res_id = $test_myRestaurant->getRestaurantID();
            $test_myReview = new RestaurantReview($review, $id, $res_id);
            $test_myReview->save();

            //Act
            $result = $test_myReview->getResID($review);

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        // function test_getAllReviews()
        // {
        //     //Arrange
        //     $name = "Russian Cuisine";//CUISINE
        //     $id = null;
        //     $test_myCuisine = new Cuisine($name, $id);
        //     $test_myCuisine->save();
        //
        //     $res_name = 'Kachka';//RESTAURANT
        //     $description = 'Delicious Russian food soaked in vodka';
        //     $cuisine_id = $test_myCuisine->getCuisineID();
        //     $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id, $description);
        //     $test_myRestaurant->save();
        //
        //     $review = "yum-tastic";//this is a Review
        //     $res_id = $test_myRestaurant->getRestaurantID();
        //     $test_myReview = new RestaurantReview($review, $id, $res_id);
        //     $test_myReview->save();
        //
        //     $review2 = "It was ok 2/10";//this is a Review
        //     $res_id = $test_myRestaurant->getRestaurantID();
        //     $test_myReview2 = new RestaurantReview($review2, $id, $res_id);
        //     $test_myReview2->save();
        //
        //     //Act
        //     $result = RestaurantReview::getAllReviews();
        //
        //     //Assert
        //     $this->assertEquals([$test_myReview, $test_myReview2], $result);
        // }
    }
?>
