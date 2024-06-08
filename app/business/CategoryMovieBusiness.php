<?php
namespace MC\Business;
use MC\DataAccess\CategoryMovieDaoMySql;
use MC\Helpers\Errors\RedirectException;
use PDOException;

class CategoryMovieBusiness 
{
    private CategoryMovieDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new CategoryMovieDaoMySql();
    }

    public function find($id, $as_array = false){
        try{
            $data = $this->dao->find($id, $as_array);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "Una relación de categoría/película no fue encontrada");
        }
        return $data; //validar si existe;
    }

    public function all($array, $as_array = false){
        try{
            $data = $this->dao->all($array, $as_array);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "Las relaciones de categoría/película no están disponibles");
        }
       
        return $data;
    }

    public function getColumns(){
        return $this->dao->getColumns();
    }
    //TODO: Try catch
    public function create(array $data){
        unset($data['id']);
        unset($data['SAVE']);

        try{
            $this->dao->create($data);

        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "No se pudo crear la nueva relación de categoría/película");
        }
    }
    
    //TODO: Try catch
    public function update(array $data){
        unset($data['SAVE']);
        
        try{
            $this->dao->update($data);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "No se pudo editar la relación de categoría/película");
        }
    }

    public function delete(int $id){
       
        try{
            $this->dao->delete($id);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "No se pudo borrar la relación de categoría/película");
        }
    }

    public function getMovieAndCategoryName(int $id = null, $includeOtherIds = false){
        return $this->dao->getMovieAndCategoryName($id, $includeOtherIds);
    }

}