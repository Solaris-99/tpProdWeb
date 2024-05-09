<?php
require __DIR__ . '/../dataAccess/DaoMySql.php';

class MovieBusiness 
{
    private $id;
    private $title;
    private $estreno;
    private $rating;
    private $duracion;
    private $poster;
    private $genero;

    public function __construct($movie)
    {
        $this->id = $movie['id'];
        $this->title = $movie['title'];
        $this->estreno = $movie['estreno'];
        $this->rating = $movie['rating'];
        $this->duracion = $movie['duracion'];
        $this->poster = $movie['poster'];
        $this->genero = $movie['genero'];

    }

    public function find($id){
        $dao = DaoMySql::getInstace();
        $movie = $dao->find($id);
        return new MovieBusiness($movie);
    }

    public function all(){
        $dao = DaoMySql::getInstace();
        $movie_data = $dao->all();
        $movies = [];
        foreach($movie_data as $movie){
            array_push($movies,new MovieBusiness($movie_data));
        }
        return $movies;
    }



}