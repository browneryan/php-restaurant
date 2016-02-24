<?php

class Cuisine
{
    private $name;
    private $id;

    function __construct($name, $id = null)
    {
        $this->name = $name;
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($new_name)
    {
        return $this->name = (string) $new_name;
    }

    function getID()
    {
        return $this->id;
    }

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO cuisines (name) VALUES ('{$this->getName()}')");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
    {
        $result_cuisines = $GLOBALS['DB']->query("SELECT * FROM cuisines;");
        $cuisines = array();
        foreach ($result_cuisines as $cuisine) {
          $cuisine_name = $cuisine['name'];
          $cuisine_id = $cuisine['id'];
          $new_cuisine = new Cuisine($cuisine_name, $cuisine_id);
          array_push($cuisines, $new_cuisine);
        }
        return $cuisines;
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM cuisines;");
    }
}
?>
