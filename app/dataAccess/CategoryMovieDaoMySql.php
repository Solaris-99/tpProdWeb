<?php
require_once __DIR__ . '/Dao.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../entity/CategoryMovie.php';

//best name ever

class CategoryMovieDaoMySql extends Dao

{
    public function __construct()
    {
        global $con;
        $this->pdo = $con;
        $this->table = 'category_movie';
        $this->entityName = 'CategoryMovie';
    }

    public function getMovieAndCategoryName(int $id = null, $includeOtherIds = false){
        $otherIds = "";
        if($includeOtherIds){
            $otherIds = ", category_movie.id_movie, category_movie.id_category";
        }

        $sql = "SELECT category_movie.id $otherIds, movie.title, category.name FROM category_movie
        INNER JOIN category ON category_movie.id_category = category.id
        INNER JOIN movie ON category_movie.id_movie = movie.id";
        
        if($id != null){
            $sql .= " WHERE id_category_movie = ?";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if($id!=null){
            $stmt->execute([$id]);
            $data = $stmt->fetch();
        }
        else {
            $stmt->execute();
            $data = $stmt->fetchAll();
        }
        return $data;
    }

}
