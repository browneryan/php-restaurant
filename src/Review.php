<?php

class Review
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
        return $this->description = (string) $new_description;
    }

    function getID()
    {
        return $this->id;
    }

    function getResID()
    {
        return $this->res_id;
    }

}
?>
