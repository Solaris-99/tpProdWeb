<?php

require_once __DIR__ . '/Dao.php';
require_once __DIR__ . '/../entity/MovieUser.php';

class MovieUserDaoMySql extends Dao{

    public function __construct()
    {   
        global $con;
        $this->pdo = $con;
        $this->table = 'movie_user';
        $this->entityName = 'MovieUser';

    }

    public function getMoviesOfUser(int $id_user){
        $stmt = $this->pdo->prepare("SELECT id_movie from $this->table WHERE id_user = ?");
        $stmt->setFetchMode(PDO::FETCH_COLUMN,0);
        $stmt->execute([$id_user]);
        return $stmt->fetchAll();
    }
}

