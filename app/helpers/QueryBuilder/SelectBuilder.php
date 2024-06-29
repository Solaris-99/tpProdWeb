<?php

namespace MC\Helpers\QueryBuilder;

use MC\Helpers\QueryBuilder\QueryBuilder;
use Exception;

class SelectBuilder extends QueryBuilder{

    protected function __construct(string ...$cols){
        $this->values = [];
        $this->condition = false;
        $concatCols = $this->appendStrings(...$cols);
        $this->query = "SELECT $concatCols";
    }

    public function from(string $table){
        $this->query .= " FROM $table ";
        return $this;
    }

    public function groupBy(string $col){
        $this->query .= " GROUP BY $col ";
    }
    
    public function join(?array $tables){
        if($tables == null){return $this;}
        if($this->condition){
            throw new Exception("where statement initialized before inner join");
        }
        foreach($tables as $item){
            $table1 = $item[0];
            $column1 = $item[1];
            $column2 = $item[2];
            $this->query .= " INNER JOIN $table1 ON $column1 = $column2";
        }
        return $this;
    }

    


}