<?php
require_once __DIR__. '/Dao.php';
require_once __DIR__. '/../config/db.php';
require_once __DIR__. '/../entity/Movie.php';

class MovieDaoMySql extends Dao
{   
    public function __construct()
    {   
        global $con;
        $this->pdo = $con;     
    }

    public function find($id){
        $stmt = $this->pdo->prepare('SELECT * FROM movie WHERE id = ?');
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Movie'); 
        $stmt->execute([$id]);
        $pelicula = $stmt->fetch();
        return $pelicula;
    }

    public function all(array $filter){
        $sql = 'SELECT * FROM movie';
        $bindings = [];
        if(!empty($filter)){
            $filters = [];
            $sql .= " WHERE ";
            if(isset($filter['release'])){
                $bindings[":release_min"] = $filter['release'] . '-01-01';
                $bindings[":release_max"] = $filter['release'] . '-12-31';
                array_push($filters,"`release` >= :release_min AND `release` <= :release_max");
            }
            $sql .=  implode( " AND ", $filters);
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);
        
        $movies = $stmt->fetchAll(PDO::FETCH_CLASS,'Movie');
        return $movies;
    }

    public function getCategories($id){
        $sql = 'SELECT `name` FROM category 
        INNER JOIN category_movie ON category.id = category_movie.id_category
        INNER JOIN movie ON category_movie.id_movie = movie.id
        WHERE movie.id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_NUM); 
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }


}

