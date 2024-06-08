<?php
namespace MC\DataAccess;

use MC\DataAccess\Dao;
use MC\Entity\CategoryMovie;
use PDO;



class CategoryMovieDaoMySql extends Dao

{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'category_movie';
        $this->entityName =   CategoryMovie::class;
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
