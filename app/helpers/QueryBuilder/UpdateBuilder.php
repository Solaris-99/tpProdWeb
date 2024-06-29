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
        $this->values = [];
    }

    public function set(array $values){
        // values: [[col1, val1], [col2 ,val2]...]
        $sets = [];
        foreach($values as $item){
            $col = $item[0];
            array_push($sets, "`$col` = :$col ");
            $this->values[":$col"] = $item[1];
        }
        $this->query.= $this->appendStrings(...$sets);
        return $this;
    }

    public function getQuery():string{
        if(!$this->condition){
            throw new Exception("No condition on update");
        }
        return $this->query;
    }

}