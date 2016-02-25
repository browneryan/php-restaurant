<?php

class RestaurantReview
{
    private $review;
    private $id;
    private $res_id;

    function __construct($review, $id = null, $res_id)
    {
        $this->review = $review;
        $this->id = $id;
        $this->res_id = $res_id;
    }

    function getReview()
    {
        return $this->review;
    }

    function setReview($new_review)
    {
        return $this->review = (string) $new_review;
    }

    function getReviewID()//gets review ID for restaurant_review table
    {
        return $this->id;
    }

    function getResID()//gets primary key for restaurant_review table
    {
        return $this->res_id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO restaurant_review (review, res_id) VALUES ('{$this->getReview()}', {$this->getResID()})");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM restaurant_review;");
    }

}
?>
