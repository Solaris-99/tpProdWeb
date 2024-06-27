<?php

namespace MC\Helpers\QueryBuilder;
use MC\Helpers\QueryBuilder\QueryBuilder;

class SelectBuilder extends QueryBuilder{
    private bool $condition;
    protected function __construct(string ...$cols){
        $this->cols = $cols;
        $this->condition = false;
        $concatCols = $this->appendStrings($cols);
        $this->query = "SELECT $concatCols";
    }

    public function from(string $table){
        $this->query .= " FROM $table ";
        return $this;
    }

    public function where(string $col, string $operand){
        $this->condition = true;
        $this->query .= " WHERE $col $operand :$col ";
    }

    public function or(string $col, string $operand){
        if( !$this->condition ){    
            throw new \Exception("Where statement not initialized");
        }
        $this->query .= " OR $col $operand :$col";
        return $this;
    }

    public function and(string $col, string $operand){
        if( !$this->condition ){    
            throw new \Exception("Where statement not initialized");
        }
        $this->query .= " AND $col $operand :$col";
        return $this;
    }
    


}