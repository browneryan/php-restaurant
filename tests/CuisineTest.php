<!-- testing with php unit, use this template for guidance -->
<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Cuisine.php';

    $server = 'mysql:host=localhost;dbname=cuisine_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

    class TestCuisine extends PHPUnit_Framework_TestCase
    {

        // protected function tearDown()
        //   {
        //       Cuisine::deleteAll();
        //       Restaurant::deleteAll();
        //   }

        function test_getName_ofCuisine()
        {
            // Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);

            // Act
            $result = $test_myCuisine->getName($name);

            // Assert
            $this->assertEquals($name, $result);
        }

        function test_setName_ofCuisine()
        {
            //Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);

            //Act
            $result = $test_myCuisine->setName($name);

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getID_ofCuisine()
        {
            //Arrange
            $name = 'Mexican Food';
            $id = 1;
            $test_myCuisine = new Cuisine($name, $id);

            //Act
            $result = $test_myCuisine->getID();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

    }
?>
