<?php

class Review{
    
    protected $review_id;
    protected $user_id;
    protected $review;
    protected $valoracion;

    public function __construct($review_id,$user_id,$review,$valoracion){
        $this->review_id = $review_id;
        $this->user_id = $user_id;
        $this->review = $review;
        $this->valoracion = $valoracion;
    }

    /**
     * Get the value of review_id
     */
    public function getReviewId()
    {
        return $this->review_id;
    }

    /**
     * Set the value of review_id
     */
    public function setReviewId($review_id): self
    {
        $this->review_id = $review_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of review
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set the value of review
     */
    public function setReview($review): self
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get the value of valoracion
     */
    public function getValoracion()
    {
        return $this->valoracion;
    }

    /**
     * Set the value of valoracion
     */
    public function setValoracion($valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }
}
?>