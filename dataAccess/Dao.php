<?php
require __DIR__. '/../entity/Movie.php';

abstract class Dao{

    protected $pdo;
    abstract public function all(array $filter);
    abstract public function find(int $id);
    //create
    // abstract public function create(array $data)
    //edit
    // abstract public function delete(array $data)
    // abstract public function update(array $data)
}
