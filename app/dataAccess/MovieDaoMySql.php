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

    public function all(array $filter, bool $as_array = false, int $page = null){
        $moviesPerPage = 10; // podría pasarse como parametro (atributo).
        $sql = 'SELECT movie.id, movie.title, movie.release, movie.duration, movie.rating, movie.description, movie.price FROM movie';
        $bindings = [];

        if(!empty($filter)){
            $filters = [];
            if(!empty($filter['id_category'])){
                $sql .= ' inner join category_movie on category_movie.id_movie = movie.id
                inner join category on category_movie.id_category = category.id WHERE ';
                array_push($filters, "id_category = :id_category");
                $bindings[":id_category"] = $filter['id_category'];
            }
            else{
                $sql .= " WHERE ";
            }
            if(!empty($filter['release'])){
                $bindings[":release_min"] = $filter['release'] . '-01-01';
                $bindings[":release_max"] = $filter['release'] . '-12-31';
                array_push($filters,"movie.release >= :release_min AND movie.release <= :release_max");
            }
            if(!empty($filter['rating'])){
                $bindings[":rating"] = $filter["rating"];
                array_push($filters, "rating >= :rating");
            }
            if(!empty($filter['price'])){
                $bindings[":price"] = $filter["price"];
                array_push($filters, "price <= :price");
            }

            $sql .=  implode( " AND ", $filters);
        }
        if(!is_null($page)){
            $limitInf = $page*$moviesPerPage;
            $limitUpp = $limitInf+$moviesPerPage;
            if($page == 0){
                $sql .= " LIMIT $limitUpp";
            }
            else{
                $sql.= " LIMIT $limitInf, $limitUpp";
            }
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($bindings);
        if($as_array){
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            $movies = $stmt->fetchAll(PDO::FETCH_CLASS, $this->entityName);
        }
        return $movies;
    }

    public function getCategories(int $id, bool $ids){
        $col = 'name';
        if($ids){
            $col = 'category.id';
        }
        $sql = "SELECT $col FROM category 
        INNER JOIN category_movie ON category.id = category_movie.id_category
        INNER JOIN movie ON category_movie.id_movie = movie.id
        WHERE movie.id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_NUM); 
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function getRelated(array $categories, bool $exclude_id){
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

    public function getMovieCount(){
        $stmt = $this->pdo->prepare("SELECT COUNT(1) FROM MOVIE");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getMoviesByIds(array $ids) {
        $moviesPerPage = 10;
        if (empty($ids)) {
            return [];
        }
        $placeholders = implode(', ', array_fill(0, min($moviesPerPage, count($ids)), '?'));
        $sql = "SELECT * FROM MOVIE WHERE ID IN ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($ids);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $this->entityName);
    }

}

