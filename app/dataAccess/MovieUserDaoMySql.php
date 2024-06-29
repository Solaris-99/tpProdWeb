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

}

