<?php
namespace MC\DataAccess;
use PDO;
use MC\Config\Connection;
use MC\Helpers\QueryBuilder\QueryBuilder;

abstract class Dao
{

    protected PDO $pdo;
    protected string $table;
    protected string $entityName;

    public function __construct()
    {
        $this->pdo = Connection::getCon();
    }
    
    public function all(array $cols, ?array $filter = null, ?int $limit = null, ?int $upper_limit = null, ?array $joins = null, bool $as_array = false) {

        $qryBuilder = QueryBuilder::select(...$cols);
        $qryBuilder->from($this->table)->join($joins)->where($filter)->limit($limit, $upper_limit);
        $qry = $qryBuilder->getQuery();
        $values = $qryBuilder->getValues();
        $stmt = $this->pdo->prepare($qry);
        if ($as_array) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName);
        }
        $stmt->execute($values);
        $data = $stmt->fetchAll();
        return $data;
    }

    public function find(array $cols, ?array $filter = null, ?array $joins = null, bool $as_array = false){
        $qryBuilder = QueryBuilder::select(...$cols)
        ->from($this->table)
        ->join($joins)
        ->where($filter);
        $stmt = $this->pdo->prepare($qryBuilder->getQuery());
        if($as_array){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        else{
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName); 
        }

        $stmt->execute($qryBuilder->getValues());
        $data = $stmt->fetch();
        return $data;
    }


    public function getColumns()
    {
        $stmt = $this->pdo->prepare("DESCRIBE $this->table");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }
    //create
    public function create(array $data)
    {
        $qryBuilder = QueryBuilder::insert($this->table);
        $values = [];
        foreach($data as $key=>$val){
            array_push($values,[$key,$val]);
        }
        $qryBuilder->vals($values);
        $stmt = $this->pdo->prepare($qryBuilder->getQuery());
        $stmt->execute($qryBuilder->getValues());
    }
    // abstract public function delete(array $data)
    public function update(array $data, ?array $conditions)
    {
        $qryBuilder = QueryBuilder::update($this->table);
        $values = [];
        foreach($data as $key=>$val){
            array_push($values,[$key,$val]);
        }
        $qryBuilder->set($values)
        ->where($conditions);
        $stmt = $this->pdo->prepare($qryBuilder->getQuery());
        $stmt->execute($qryBuilder->getValues());
    }

    public function delete(array $conditions){
        $qryBuilder = QueryBuilder::delete($this->table)->where($conditions);
        $stmt = $this->pdo->prepare($qryBuilder->getQuery());
        $stmt->execute($qryBuilder->getValues());
    }

    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }
}
