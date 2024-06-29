<?php

namespace MC\Helpers\QueryBuilder;
use MC\Helpers\QueryBuilder\QueryBuilder;


class InsertBuilder extends QueryBuilder
{
    protected function __construct($table)
    {
        $this->table = $table;
        $this->values = [];
        $this->query = "INSERT INTO $table ";
    }

    public function vals(array $values){
        // values = [[col1, val1], [col2,val2]]
        $this->query .= "( ";
        $cols = [];
        foreach($values as $item){
            $col = $item[0];
            array_push($cols,$col);
            $this->values[":$col"]= $item[1];
        }
        $this->query .= $this->appendStrings(...array_map(function($e){return "`$e`";},$cols));
        $this->query .= ") VALUES (";
        $this->query .= $this->makeNamedParams($cols) . ")";

        return $this;
    }
    

}