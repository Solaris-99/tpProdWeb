<?php
namespace MC\DataAccess;
use MC\DataAccess\Dao;
use MC\Entity\Movie;
use PDO;

class MovieDaoMySql extends Dao
{   
    public function __construct()
    {   
        parent::__construct();
        $this->table = 'movie';
        $this->entityName = Movie::class;
    }

    public function getRelated(array $categories, int $exclude_id){    
        $sql = "SELECT movie.id, movie.title FROM movie
        INNER JOIN category_movie ON category_movie.id_movie = movie.id
        INNER JOIN category ON  category_movie.id_category = category.id
        WHERE (";
        $bindings = [];
        foreach($categories as $k){
            array_push($bindings," category_movie.id_category = ? ");
        }
        array_push($categories, $exclude_id); // añadir a lo ultimo para pasarlo como bind
        $sql .= implode( " OR ", $bindings);
        $sql .= ") AND movie.id != ?";
        $sql .= " GROUP BY id LIMIT 4";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($categories);
        $movies = $stmt->fetchAll(PDO::FETCH_CLASS, $this->entityName);
        return $movies;
    }

    public function getMoviesByIds(array $ids,int $page, string $title) {
        $items_per_page = 10;
        $low_lim = $page*$items_per_page;        
        $up_lim = $low_lim+$items_per_page;

        if (empty($ids)) {
            return [];
        }
        $placeholders = implode(', ', array_fill(0, count($ids), '?'));
        $sql = "SELECT * FROM MOVIE WHERE ID IN ($placeholders)";
        if(!empty($title)){
            $sql .=  " AND title LIKE ?";
        }
        $stmt = $this->pdo->prepare($sql);
        if(!empty($title)){
            array_push($ids,$title);
        }
        $stmt->execute($ids);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->entityName);
    }

}

