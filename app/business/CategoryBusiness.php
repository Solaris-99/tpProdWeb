<?php
require_once __DIR__.'/../dataAccess/CategoryDaoMySql.php';
require_once __DIR__.'/../helpers/errors/RedirectException.php';

class CategoryBusiness 
{
    private CategoryDaoMySql $dao;
    
    public function __construct()
    {
        $this->dao = new CategoryDaoMySql();
    }

    public function find($id, $as_array = false){
        $category = $this->dao->find($id, $as_array);
        if(empty($category) && !$as_array){
            return "No hay categorías para mostrar";
        }
        else if (empty($category)){
            //vacío y es requerido como array (páginas de adm)
            throw new RedirectException("./500.php", "Una categoría no fue encontrada");
        }
        return $category;
    }

    public function all($array, $as_array = false){
        $categorys = $this->dao->all($array, $as_array);
        return $categorys;
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
        catch (PDOException $e){
            throw new RedirectException("./500.php", "Ocurrio un error creando la categoría");
        }
    }
    
    //TODO: Try catch
    public function update(array $data){
        unset($data['SAVE']);
        try{
            $this->dao->update($data);
        }
        catch (PDOException $e){
            throw new RedirectException("./500.php", "Ocurrio un error actualizando la categoría");
        }
    }

    public function delete(int $id){
       
        try{
            $this->dao->delete($id);
        }
        catch (PDOException $e){
            throw new RedirectException("./500.php", "Ocurrio un error eliminando la categoría");
        }
    }



}