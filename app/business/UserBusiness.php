<?php
namespace MC\Business;

use Exception;
use MC\DataAccess\UserDaoMySql;
use MC\DataAccess\RoleDaoMySql;
use MC\Helpers\Errors\RedirectException;

class UserBusiness extends Business{
    private RoleDaoMySql $roleDao;
    
    public function __construct()
    {
        $this->dao = new UserDaoMySql();
        $this->roleDao = new RoleDaoMySql();
    }


    public function create(array $data){
        try{

            unset($data['submit']);
            // validar email->email, trim; password; name->trim
            // todos -> no vacio
            if(empty($data["username"]) || empty($data["email"]) || empty($data["username"])){
                throw new RedirectException("register.php", "Todos los campos son requeridos");
            }
            $data["username"] = trim($data["username"]);
            $data["email"] = trim($data["email"]);
            if(!filter_var($data["email"],FILTER_VALIDATE_EMAIL)){
                throw new RedirectException("register.php", "Email no valido");
            }

            
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['id_role'] = $this->roleDao->find(["id"],[["name","=","end_user"]])->getId();
            $this->dao->create($data);
            $user = $this->dao->find(["*"],[["email","=",$data["email"]]]);
            $_SESSION['id_user'] = $user->getId();
            $_SESSION['id_role'] = $user->getIdRole();
            header('location: index.php');
        }
        catch (Exception $e){
            throw new RedirectException("register.php","Ocurrió un error creando el usuario, por favor intentar nuevamente");
        }
    }

}