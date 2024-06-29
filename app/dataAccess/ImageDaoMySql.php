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

}