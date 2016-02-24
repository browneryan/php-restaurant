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

        protected function tearDown()
          {
              Cuisine::deleteAll();
            //   Restaurant::deleteAll();
          }

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

        function test_save()
        {
            //Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);
            $test_myCuisine->save();

            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals($test_myCuisine, $result[0]);
        }

        function test_getAll()
        {
            //Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);
            $test_myCuisine->save();
            $name2 = 'Russian Food';
            $test_myCuisine2 = new Cuisine($name2);
            $test_myCuisine2->save();

            //Act
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([$test_myCuisine, $test_myCuisine2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);
            $test_myCuisine->save();
            $name2 = 'Russian Food';
            $test_myCuisine2 = new Cuisine($name2);
            $test_myCuisine2->save();

            //Act
            Cuisine::deleteAll();
            $result = Cuisine::getAll();

            //Assert
            $this->assertEquals([], $result);

        }

        function test_find()//finds all restaurants in a cuisine
        {
            //Arrange
            $name = 'Mexican Food';
            $test_myCuisine = new Cuisine($name);
            $test_myCuisine->save();
            $name2 = 'Russian Food';
            $test_myCuisine2 = new Cuisine($name2);
            $test_myCuisine2->save();

            //Act
            $result = Cuisine::find($test_myCuisine->getID());

            //Assert
            $this->assertEquals($test_myCuisine, $result);

        }


    }
?>
