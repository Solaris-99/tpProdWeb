<?php
namespace MC\DataAccess;
use MC\DataAccess\Dao;
use MC\Entity\Image;
use PDO;

class ImageDaoMySql extends Dao{

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'image';
        $this->entityName = Image::class;
    }

    public function getBanner(int $movie_id){
        $stmt = $this->pdo->prepare("SELECT `path` FROM image WHERE id_movie = ? and is_banner = 1;");
        $stmt->setFetchMode(PDO::FETCH_COLUMN,0);
        $stmt->execute([$movie_id]);
        return $stmt->fetch();
    }

}