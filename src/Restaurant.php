<?php

class Restaurant
{
    private $res_name;
    private $id;
    private $cuisine_id;
    private $description;

    function __construct($res_name, $id = null, $cuisine_id, $description)
    {
        $this->res_name = $res_name;
        $this->id = $id;
        $this->cuisine_id = $cuisine_id;
        $this->description;
    }

    function getDescription()
    {
        return $this->description;
    }

    function setDescription($new_description)
    {
        return $this->description = (string) $new_description;
    }

    function getName()
    {
        return $this->res_name;
    }

    function setName($new_res_name)
    {
        return $this->res_name = (string) $new_res_name;
    }

    function getID()
    {
        return $this->id;
    }

    function getCuisineID()
    {
        return $this->cuisine_id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO restaurants (name, cuisine_id, description) VALUES ('{$this->getName()}', {$this->getCuisineID()}, '{$this->getDescription()}')");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {   //empty array, for each, ['name'], push to array etc.
        $returned_restaurants = $GLOBALS['DB']->query("SELECT * FROM restaurants;");
        $all_restaurants = array();
        foreach($returned_restaurants as $restaurant) {
            $restaurant_name = $restaurant['name'];
            $restaurant_id = $restaurant['id'];
            $restaurant_cuisine_id = $restaurant['cuisine_id'];
            $restaurant_description = $restaurant['description'];
            $new_restaurant = new Restaurant($restaurant_name, $restaurant_id, $restaurant_cuisine_id, $restaurant_description);
            array_push($all_restaurants, $new_restaurant);
        }
        return $all_restaurants;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM restaurants;");
    }

    static function find($search_id)
    {
        $all_restaurants = Restaurant::getAll();
        $found_restaurant = array();
        foreach($all_restaurants as $restaurant){
            $restaurant_id = $restaurant->getID();
            if ($restaurant_id == $search_id){
                array_push($found_restaurant, $restaurant);
            }
            return $found_restaurant;
        }

    }
}
?>
