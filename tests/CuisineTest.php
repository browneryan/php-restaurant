<!-- testing with php unit, use this template for guidance -->
<?php
    require_once __DIR__ . '/../src/Cuisine.php';

    class TestCuisine extends PHPUnit_Framework_TestCase
    {
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
