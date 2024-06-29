<?php
namespace MC\Business;
use MC\DataAccess\RoleDaoMySql;

class RoleBusiness extends Business{
    
    public function __construct()
    {
        $this->dao = new RoleDaoMySql();
    }

}