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

}
?>
