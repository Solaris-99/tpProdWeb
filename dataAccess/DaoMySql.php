<?php


class DaoMySql
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=peliculas;port=3306', 'root', '');
        }
        catch (PDOException $e){
            var_dump($e); //mostrar error/pagina personalizada
        }
    }

    public static function getInstace(){
        if(self::$instance == null){
            self::$instance = new DaoMySql();
        }
        return self::$instance;
    }

    public function find($id){
        //validar y demas
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas WHERE id = ?');
        $stmt->execute([$id]);
        $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pelicula;
    }

    public function all(){
        $stmt = $this->pdo->prepare('SELECT * FROM peliculas');
        $stmt->execute();
        $peliculas = $stmt->fetch(PDO::FETCH_ASSOC);
        return $peliculas;
    }


}

