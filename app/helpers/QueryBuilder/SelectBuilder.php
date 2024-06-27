<?php

namespace MC\Helpers\QueryBuilder;

use MC\Helpers\QueryBuilder\QueryBuilder;

class SelectBuilder extends QueryBuilder{

    protected function __construct(string ...$cols){
        $this->cols = $cols;
        $this->condition = false;
        $concatCols = $this->appendStrings(...$cols);
        $this->query = "SELECT $concatCols";
    }

    public function from(string $table){
        $this->query .= " FROM $table ";
        return $this;
    }

    


}