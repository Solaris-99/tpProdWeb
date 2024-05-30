<?php

require_once __DIR__ . '/Dao.php';
require_once __DIR__ . '/../entity/MovieUser.php';

class UserMovieDaoMySql extends Dao{

    public function __construct()
    {   
        global $con;
        $this->pdo = $con;
        $this->table = 'movie_user';
        $this->entityName = 'MovieUser';

    }


}

