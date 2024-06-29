<?php
namespace MC\Helpers\QueryBuilder;

use MC\Helpers\QueryBuilder\QueryBuilder;
use Exception;

class DeleteBuilder extends QueryBuilder{

    protected function __construct(string $table){
        $this->$table = $table;
        $this->values = [];
        $this->query = "DELETE FROM $table ";
    }

    public function getQuery():string{
        if(!$this->condition){
            throw new Exception("No condition on delete");
        }
        return $this->query;
    }

}