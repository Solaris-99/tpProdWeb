<?php
namespace MC\Business;
use MC\DataAccess\MovieDaoMySql;
use MC\Helpers\Errors\RedirectException;
use PDOException;
use MC\Business\Business;
use MC\Business\ImageBusiness;
use MC\DataAccess\CategoryDaoMySql;

class MovieBusiness extends Business
{
    private ImageBusiness $imageBusiness;
    private CategoryDaoMySql $categoryDao;
    
    public function __construct()
    {
        $this->dao = new MovieDaoMySql();
        $this->imageBusiness = new ImageBusiness();
        $this->categoryDao = new CategoryDaoMySql();
    }

    public function find($id, $as_array = false){        
        try{
            $movie = $this->dao->find(["*"],[["id","=",$id]],null,$as_array);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php","Algo salió mal buscando ésta película, por favor intentalo más tarde");
        }
        if(empty($movie)){
            throw new RedirectException("./404.php","",404);
        }
        return $movie; //validar si existe;
    }

    public function all(array $cols = ["*"], array $filter = null, bool $as_array = false){
        try{
            $page = 0;
            $joins = null;
            $curatedFilters = [];
            $lim = null;
            $up_lim = null;
            if(isset($filter["page"]) && !($filter["page"] == "all")){
                    $page = $filter["page"];
                    $lim = $page*10;
                    $up_lim = $lim + 10;
            }
            if(isset($filter["id_category"]) && !empty($filter["id_category"])){
                $joins = [["category_movie","movie.id","category_movie.id_movie"],["category","category_movie.id_category","category.id"]];
                array_push($curatedFilters,["id_category", "=", $filter["id_category"]]);
            }
            if(isset($filter["release"]) && !empty($filter["release"])){
                array_push($curatedFilters,["release", ">=", $filter["release"]."-01-01", "release_min"]);
                array_push($curatedFilters,["release", "<=", $filter["release"]."-12-31", "release_max"]);
            }
            if(isset($filter["price"]) && !empty($filter["price"])){
                array_push($curatedFilters,["price", "<=", $filter["price"]]);
            }
            if(isset($filter["rating"]) && !empty($filter["rating"])){
                array_push($curatedFilters,["rating", ">=", $filter["rating"]]);
            }
            $movies = $this->dao->all($cols,$curatedFilters,$lim,$up_lim,$joins, $as_array);
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
            $col = "name";
            if($ids){
                $col = "category.id";
            }
            // $cats =  $this->dao->getCategories($id, $ids);
           $cats = $this->categoryDao->all([$col],[["movie.id","=",$id,"movie_id"]],null,null,[["category_movie", "category.id","category_movie.id"],["movie", "category_movie.id_movie","movie.id"]], true);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal buscando las categorias de una pélicula");
        }
       
        if($ids){
            $ids_cats = [];
            foreach($cats as $c){
                array_push($ids_cats,$c["id"]);
            }
            return $ids_cats;
        }
        
        $catsStr = '';
        foreach($cats as $c){
            $catsStr.= $c["name"] . " ";
        }
        
        return $catsStr;
    }

    public function create(array $data, array $imgFileData= null){
        unset($data['id']);
        unset($data['SAVE']);
        try{
            $this->dao->create($data);
            if($imgFileData['image']['tmp_name'] != ''){
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

    public function getRelated(array $categories, int $exclude_id){
        if(empty($categories)){return "";}
        return $this->dao->getRelated($categories, $exclude_id);
    }

    public function getNumOfPages(){
        return ceil($this->dao->find(["COUNT(1)"],as_array:true)["COUNT(1)"]/10);
    }

    public function getMoviesByIds(array $ids, int $page = 0){
        $moviesPerPages = 10;
        if(count($ids) > $moviesPerPages){
            $ids = array_slice($ids, max($moviesPerPages*$page,0), $moviesPerPages);
        }
        return $this->dao->getMoviesByIds($ids, $page);
    }

}