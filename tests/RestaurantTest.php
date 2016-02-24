<!-- testing with php unit, use this template for guidance -->
<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Restaurant.php';
    require_once __DIR__ . '/../src/Cuisine.php';

    $server = 'mysql:host=localhost;dbname=cuisine_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

    class TestRestaurant extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
          {
            //   Restaurant::deleteAll();
              Cuisine::deleteAll();
          }

          function test_setName()
          {
              //Arrange
              $name = "Russian Cuisine";
              $id = null;
              $test_myCuisine = new Cuisine($name, $id);
              $test_myCuisine->save();

              $res_name = 'Kachka';
              $cuisine_id = $test_myCuisine->getID();
              $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id);
              $test_myRestaurant->save();

              //Act
              $result = $test_myRestaurant->setName($res_name);

              //Assert
              $this->assertEquals($res_name, $result);
          }

        function test_getName()
        {
            //Arrange
            $name = "Russian Cuisine";
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';
            $cuisine_id = $test_myCuisine->getID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id);
            $test_myRestaurant->save();

            //Act
            $result = $test_myRestaurant->getName($res_name);

            //Assert
            $this->assertEquals($res_name, $result);
        }

        function test_getID_ofRestaurant()
        {
            // Arrange
            $name = "Russian Cuisine";
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';
            $cuisine_id = $test_myCuisine->getID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id);
            $test_myRestaurant->save();

            // Act
            $result = $test_myRestaurant->getID();

            // Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getCuisineID()
        {
            // Arrange
            $name = "Russian Cuisine";
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';
            $cuisine_id = $test_myCuisine->getID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id);
            $test_myRestaurant->save();

            // Act
            $result = $test_myRestaurant->getCuisineID();

            // Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_save()
        {
            //Arrange
            $name = "Russian Cuisine";
            $id = null;
            $test_myCuisine = new Cuisine($name, $id);
            $test_myCuisine->save();

            $res_name = 'Kachka';
            $cuisine_id = $test_myCuisine->getID();
            $test_myRestaurant = new Restaurant($res_name, $id, $cuisine_id);
            $test_myRestaurant->save();

            // $res_name2 = 'Vladimir';
            // $cuisine_id2 = $test_myCuisine->getID();
            // $test_myRestaurant2 = new Restaurant($res_name2, $id, $cuisine_id2);
            // $test_myRestaurant2->save();

            //Act
            $result = Restaurant::getAll();

            //Assert
            $this->assertEquals($test_myRestaurant, $result);

        }
    }
?>
