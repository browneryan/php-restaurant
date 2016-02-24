<!-- testing with php unit, use this template for guidance -->
<?php
    require_once __DIR__ . '/../src/Cuisine.php';

    class TestCuisine extends PHPUnit_Framework_TestCase
    {
        function test_getName_ofCuisine()
        {
            // Arrange
            $input = 'Mexican Food';
            $test_myCuisine = new Cuisine($input);

            // Act
            $result = $test_myCuisine->getName($input);

            // Assert
            $this->assertEquals($input, $result);
        }
    }
?>
