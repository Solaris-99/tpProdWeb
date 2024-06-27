<?php

namespace MC\Helpers\QueryBuilder;

use Exception;

abstract class QueryBuilder
{
    protected bool $condition;
    protected string $table;
    protected string $query;
    protected array $cols;
    /**
     * Insert from...
     * @param table the table to insert into.
     */
    public static function insert(string $table){
        return new InsertBuilder($table);
    }

    public static function select(string ...$cols){
        return new SelectBuilder(...$cols);
    }

    public static function update(string $table){
        return new UpdateBuilder($table);
    }

    public static function delete(string $table){
        return new DeleteBuilder($table);
    }

    protected function appendStrings(string ...$strings){
        $concatStrings = implode(", ", $strings);
        return $concatStrings;
    }

    protected function makeNamedParams(): string{
        $params = array_map(function($e){
            return ":$e";
        },$this->cols);
        return implode(", ", $params);
    }

    public function getQuery(): string{ 
        return $this->query;
    }

    
    public function join(string $table){
        if($this->condition){
            throw new Exception("where statement initialized before inner join");
        }
        $this->query .= " INNER JOIN $table ON $table.id_$this->table = $this->table.id ";
        return $this;
    }

    public function where(string $col, string $operand){
        $this->condition = true;
        $this->query .= " WHERE $col $operand :$col ";
        return $this;
    }

    public function or(string $col, string $operand){
        if( !$this->condition ){    
            throw new \Exception("Where statement not initialized (OR clausule)");
        }
        $this->query .= " OR $col $operand :$col";
        return $this;
    }

    public function and(string $col, string $operand){
        if( !$this->condition ){    
            throw new \Exception("Where statement not initialized (AND clausule)");
        }
        $this->query .= " AND $col $operand :$col";
        return $this;
    }
}