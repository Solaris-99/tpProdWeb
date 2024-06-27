<?php

namespace MC\Helpers\QueryBuilder;


abstract class QueryBuilder
{
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
        return new SelectBuilder($cols);
    }

    public static function update(string $table){

    }

    public static function delete(string $table){

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
}