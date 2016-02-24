<!-- testing with php unit, use this template for guidance -->
<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Restaurant.php';
    require_once __DIR__ . '/../src/Review.php';

    $server = 'mysql:host=localhost;dbname=cuisine_test';
        $username = 'root';
        $password = 'root';
        $DB = new PDO($server, $username, $password);

    class TestReview extends PHPUnit_Framework_TestCase
    {

        protected function tearDown()
          {
              Restaurant::deleteAll();
              Review::deleteAll();
          }

    }
?>
