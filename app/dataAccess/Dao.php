<?php

abstract class Dao
{

    protected $pdo;
    protected string $table;
    protected string $entityName;
    public function all(array $filter, bool $as_array = false)    {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->table);
        if ($as_array) {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName);
        }
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function find(int $id, bool $as_array = false){
        $stmt = $this->pdo->prepare('SELECT * FROM '. $this->table .' WHERE id = ?');
        if( $as_array){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        else{
            $stmt->setFetchMode(PDO::FETCH_CLASS, $this->entityName); 
        }

        $stmt->execute([$id]);
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
        $vals = [];
        $placeholders = [];
        $cols = [];

        foreach ($data as $key => $val) {
            array_push($cols, "`$key`");
            $vals[":$key"] = $val;
            array_push($placeholders, ":$key");
        }
        $placeholders = implode(", ", $placeholders);
        $cols = implode(", ", $cols);
        $sql = "INSERT INTO $this->table( $cols ) VALUES ( $placeholders ) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals);
    }
    // abstract public function delete(array $data)
    public function update(array $data)
    {
        $sql = "UPDATE $this->table SET";
        $setClausules = [];
        $vals = [];
        foreach ($data as $key => $val) {
            if ($key == 'id') {
                $vals[":$key"] = $val;
                continue;
            }
            array_push($setClausules," `$key` = :$key"); 
            $vals[":$key"] = $val;
        }
        $sql .= implode(", ", $setClausules);
        $sql .= " WHERE `id` = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($vals);
    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}
