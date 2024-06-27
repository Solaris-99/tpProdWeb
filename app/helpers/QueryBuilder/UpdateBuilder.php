<?php

namespace MC\Helpers\QueryBuilder;

use Exception;
use MC\Helpers\QueryBuilder\QueryBuilder;

class UpdateBuilder extends QueryBuilder
{
    protected function __construct(string $table)
    {
        $this->table = $table;
        $this->query = "UPDATE $table SET ";
    }

    public function set(string ...$cols){
        $this->cols = $cols;
        $params = array_map(function($e){
            return "$e = :$e";
        },$cols);
        $concats = $this->appendStrings(...$params);
        $this->query .= "$concats ";
    }

    public function getQuery():string{
        if(!$this->condition){
            throw new Exception("No condition on update");
        }
        return $this->query;
    }

}