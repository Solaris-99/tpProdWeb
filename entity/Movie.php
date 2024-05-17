<?php
require_once 'BaseModel.php';

class Movie extends BaseModel
{
  private $title;
  private $release;
  private $rating;
  private $duration;
  private $poster;
  private $category;
  private $description;
  private $price;
    

    public function getTitle() {
      return $this->title;
    }
    public function setTitle($value) {
      $this->title = $value;
    }

    public function getRelease() {
      return $this->release;
    }
    public function setRelease($value) {
      $this->release = $value;
    }

    public function getRating() {
      return $this->rating;
    }
    public function setRating($value) {
      $this->rating = $value;
    }

    public function getDuration() {
      return $this->duration;
    }
    public function setDuration($value) {
      $this->duration = $value;
    }

    public function getPoster() {
      return $this->poster;
    }
    public function setPoster($value) {
      $this->poster = $value;
    }

    public function getCategory() {
      return $this->category;
    }
    public function setCategory($value) {
      $this->category = $value;
    }

    public function getDescription() {
      return $this->description;
    }
    public function setDescription($value) {
      $this->description = $value;
    }

    public function getPrice() {
      return $this->price;
    }
    public function setPrice($value) {
      $this->price = $value;
    }
}