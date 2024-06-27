<?php

namespace MC\Helpers\QueryBuilder;
use MC\Helpers\QueryBuilder\QueryBuilder;


class InsertBuilder extends QueryBuilder
{
    protected function __construct($table)
    {
        $this->table = $table;
        $this->query = "INSERT INTO $table";
    }

    public function into(string ...$cols){
        $this->cols = $cols;
        $concatCols = $this->appendStrings(...$cols);
        $concatParams = $this->makeNamedParams();
        $this->query .= " ($concatCols) VALUES ($concatParams)";
        return $this;
    }
    

}