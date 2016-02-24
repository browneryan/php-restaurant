<?php

class Restaurant
{
    private $res_name;
    private $id;
    private $cuisine_id;

    function __construct($res_name, $id = null, $cuisine_id)
    {
        $this->res_name = $res_name;
        $this->id = $id;
        $this->cuisine_id = $cuisine_id;
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
        $GLOBALS['DB']->exec("INSERT INTO restaurants (name, cuisine_id) VALUES ('{$this->getName()}', {$this->getCuisineID()})");
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
            $new_restaurant = new Restaurant($restaurant_name, $restaurant_id, $restaurant_cuisine_id);
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
