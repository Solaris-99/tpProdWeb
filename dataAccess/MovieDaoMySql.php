<?php
require_once __DIR__. '/Dao.php';

class MovieDaoMySql extends Dao
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=peliculas;port=3306', 'root', '');
        }
        catch (PDOException $e){
            var_dump($e); //mostrar error/pagina personalizada
        }
    }

    public function find($id){
        //validar y demas
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas WHERE id = ?');
        $stmt->execute([$id]);
        $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->hydrate($pelicula);
    }

    public function all(){
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas');
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $movies = [];
        foreach($data as $d){
            array_push($movies,$this->hydrate($d));
        }
        return $movies;
    }


}

