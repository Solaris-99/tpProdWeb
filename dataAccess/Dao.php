<?php
require __DIR__. '/../entity/Movie.php';

abstract class Dao{

    abstract public function all();
    abstract public function find(int $id);
    //create
    //edit
    protected function hydrate(array $data)
    {
        return new Movie($data);
    }

}
