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

    function getReviewID()
    {
        return $this->id;
    }

    function getResID()
    {
        return $this->res_id;
    }

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO restaurant_review(review, id, res_id) VALUES ('{$this->getReview()}', {$this->getReviewID()})");
    }

    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM restaurant_review;");
    }

}
?>
