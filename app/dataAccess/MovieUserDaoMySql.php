<?php
namespace MC\DataAccess;
use MC\DataAccess\Dao;
use MC\Entity\MovieUser;
use PDO;

class MovieUserDaoMySql extends Dao{

    public function __construct()
    {   
        parent::__construct();
        $this->table = 'movie_user';
        $this->entityName = MovieUser::class;

    }

    public function getMoviesOfUser(int $id_user){
        $stmt = $this->pdo->prepare("SELECT id_movie from $this->table WHERE id_user = ?");
        $stmt->setFetchMode(PDO::FETCH_COLUMN,0);
        $stmt->execute([$id_user]);
        return $stmt->fetchAll();
    }
}

