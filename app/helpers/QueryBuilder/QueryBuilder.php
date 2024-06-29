<?php

namespace MC\Helpers\QueryBuilder;

use Exception;

abstract class QueryBuilder
{
    protected bool $condition;
    protected string $table;
    protected string $query;
    protected array $values;
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

    protected function makeNamedParams(array $cols): string{
        $params = array_map(function($e){
            return ":$e";
        },$cols);
        return implode(", ", $params);
    }

    public function getQuery(): string{ 
        return $this->query;
    }

    public function where(?array $conditions = null){
        // conditions: [[col1, operand1, val1], [col2,operand2,val2]...]
        if($conditions == null || empty($conditions)){return $this;}
        $this->condition = true;
        $this->query .= " WHERE ";
        $conditions_arr = [];
        foreach($conditions as $item){
            $col = $item[0];
            $operand = $item[1];
            $value = $item[2];
            if(count($item) > 3){
                $named_param = $item[3];
                array_push($conditions_arr, " $col $operand :$named_param ");
                $this->values[":$named_param"] = $value;
            }
            else{
                    array_push($conditions_arr, " $col $operand :$col ");
                    $this->values[":$col"] = $value;
            }
        }
        $this->query .= implode(" AND ", $conditions_arr);
        return $this;
    }

    public function getValues(){
        return $this->values;
    }

    public function limit(?int $limit, ?int $upp_limit = null){
        if(is_null($limit)){return $this;}
        $this->query .= " LIMIT $limit ";
        if($upp_limit != null){
            $this->query .= ", $upp_limit";
        }
        return $this;
    }

}