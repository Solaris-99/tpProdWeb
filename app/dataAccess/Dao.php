<?php
require __DIR__ . '/../entity/Movie.php';

abstract class Dao
{

    protected $pdo;
    protected $table;
    abstract public function all(array $filter);
    abstract public function find(int $id);

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
