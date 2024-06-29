<?php
namespace MC\Business;
use MC\DataAccess\Dao;
use PDOException;
use MC\Helpers\Errors\RedirectException;

abstract class Business{
    protected $dao;

    // public function __construct(Dao $dao){
    //     $this->dao = $dao;
    // }
    

    public function find(int $id, bool $as_array){
        try{
            $element = $this->dao->find(["*"],[["id","=",$id]],null,$as_array);
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php","Algo salió mal encontrando un elemento");
        }
        if(empty($element)){
            throw new RedirectException("./404.php","",404);
        }
        return $element;
    }

    public function all(array $cols = ["*"], ?array $filter = null, bool $as_array = false){
        try{
            $data = $this->dao->all($cols,$filter,null,null,null,$as_array);
            return $data;
        }
        catch(PDOException $e){
            throw new RedirectException("./500.php", "No se pudieron traer los elementos");
        }
    }
   
    public function create(array $data){
        unset($data['id']);
        unset($data['SAVE']);
        try{
            $this->dao->create($data);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',$e->getTraceAsString() . " ". $e->getMessage());
        }

    }
    
    public function update(array $data){
        unset($data['SAVE']);
        $id = $data['id'];
        unset($data['id']);
        try{
            $this->dao->update($data, [['id','=',$id]]);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal editando el elemento");
        }
    }

    public function delete(int $id){
        try{
            $this->dao->delete([["id","=",$id]]);
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salió mal eliminando el elemento");
        }
    }

    /**
     * gets the columns of the table
     */
    public function getColumns(){
        try{
            $columns = $this->dao->getColumns();
        }
        catch(PDOException $e){
            throw new RedirectException('./500.php',"Algo salio mal buscando las columnas de la tabla.");
        }
        
        return $columns;
    }

}