<?php
namespace MC\Business;
use MC\Business\Business;
use MC\DataAccess\MovieUserDaoMySql;
use PDOException;
use MC\Helpers\Errors\RedirectException;

class MovieUserBusiness extends Business{
    
    public function __construct()
    {
        $this->dao = new MovieUserDaoMySql();
    }

    public function getMoviesOfUser(int $id_user){
        try{

            $user_movies = $this->all(["id_movie"],[["id_user","=",$id_user]]);
            $ids = [];
            foreach($user_movies as $um){
                array_push($ids,$um->getIdMovie());
            }
            return $ids;
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php","Ocurrió un error mostrando sus películas. Nos disculpamos.");
        }
        
    }

    public function isOwned(int $id_movie): bool{
        if(!isset($_SESSION['id_user'])){return false;}
        return !is_bool($this->dao->find(["id_movie"],[["id_user","=",$_SESSION['id_user']],["id_movie","=",$id_movie]]));
    }

    public function getNumOfUserPages(): int {
        if(!isset($_SESSION['id_user'])){return 0;}
        $movie_count = $this->dao->find(["COUNT(1)"],[["id_user","=",$_SESSION['id_user']]],as_array:true)["COUNT(1)"];
        return ceil($movie_count/10);        
    }
}