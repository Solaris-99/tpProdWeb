<?php

class Movie{
    private $id;
    private $title;
    private $estreno;
    private $rating;
    private $duracion;
    private $poster;
    private $genero;

    public function __construct(array $movie)
    {
        $this->id = $movie['id'];
        $this->title = $movie['titulo'];
        $this->estreno = $movie['estreno'];
        $this->rating = $movie['rating'];
        $this->duracion = $movie['duracion'];
        $this->poster = $movie['poster'];
        $this->genero = $movie['genero'];

    }
    

    public function getId() {
      return $this->id;
    }
    public function setId($value) {
      $this->id = $value;
    }

    public function getTitle() {
      return $this->title;
    }
    public function setTitle($value) {
      $this->title = $value;
    }

    public function getEstreno() {
      return $this->estreno;
    }
    public function setEstreno($value) {
      $this->estreno = $value;
    }

    public function getRating() {
      return $this->rating;
    }
    public function setRating($value) {
      $this->rating = $value;
    }

    public function getDuracion() {
      return $this->duracion;
    }
    public function setDuracion($value) {
      $this->duracion = $value;
    }

    public function getPoster() {
      return $this->poster;
    }
    public function setPoster($value) {
      $this->poster = $value;
    }

    public function getGenero() {
      return $this->genero;
    }
    public function setGenero($value) {
      $this->genero = $value;
    }
}