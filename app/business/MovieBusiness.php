<?php
namespace MC\Business;
use MC\DataAccess\MovieDaoMySql;
use MC\Helpers\Errors\RedirectException;
use PDOException;
use MC\Business\ImageBusiness;

class MovieBusiness 
{
    private MovieDaoMySql $dao;
    private ImageBusiness $imageBusiness;
    
    public function __construct()
    {
        $this->dao = new MovieDaoMySql();
        $this->imageBusiness = new ImageBusiness();
    }

    public function find($id, $as_array = false){        
        try{
            $movie = $this->dao->find($id, $as_array);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php","Algo salió mal buscando ésta película, por favor intentalo más tarde");
        }
        if(empty($movie)){
            throw new RedirectException("./404.php","",404);
        }
        return $movie; //validar si existe;
    }

    public function all(array $filter, bool $as_array = false, int $page = null){
        unset($filter['page']);
        try{
            $movies = $this->dao->all($filter, $as_array, $page);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php","Por el momento el sitio no está disponible. Nos disculpamos");
        }
        
        return $movies;
    }
    

    /**
     * @param int $id: el id de la pelicula a buscar;
     * @param bool $ids: retorna ids si es verdadero
     */

    public function getCategories(int $id, bool $ids = false){
        try{
            $cats =  $this->dao->getCategories($id, $ids);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal buscando las categorias de una pélicula");
        }
        if($ids){
            //retornar un array de ids
            $cats = array_merge(...$cats);
            return $cats;
        }

        $catsStr = '';
        foreach($cats as $c){
            $catsStr.= $c[0] . " ";
        }

        return $catsStr;
    }

    /**
     * gets the columns of the table
     */
    public function getColumns(){
        try{
            $columns = $this->dao->getColumns();
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salio mal buscando las columnas de la tabla de películas");
        }
        
        return $columns;
    }

    public function create(array $data, array $imgFileData){
        unset($data['id']);
        unset($data['SAVE']);
        try{
            $this->dao->create($data);
            if($imgFileData['tmp_name'] != ''){
                $imgTableData = [
                    'id_movie'=> $this->dao->getLastInsertId(),
                    'is_banner' => 1
                ];
                $this->imageBusiness->create($imgTableData,$imgFileData);
            }
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',$e->getTraceAsString() . " ". $e->getMessage());
        }

    }
    
    //TODO: Try catch
    public function update(array $data){
        unset($data['SAVE']);
        try{
            $this->dao->update($data);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal editando la película");
        }
    }

    public function delete(int $id){
        try{
            $this->dao->delete($id);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal eliminando la película");
        }
    }

    public function getRelated(array $categories, $exclude_id){
        if(empty($categories)){return "";}
        return $this->dao->getRelated($categories, $exclude_id);
    }

    public function getNumOfPages(){
        return ceil($this->dao->getMovieCount()[0]/10);
    }

    public function getMoviesByIds(array $ids, int $page = 0){
        $moviesPerPages = 10;
        if(count($ids) > $moviesPerPages){
            $ids = array_slice($ids, max($moviesPerPages*$page,0), $moviesPerPages);
        }
        return $this->dao->getMoviesByIds($ids, $page);
    }

}