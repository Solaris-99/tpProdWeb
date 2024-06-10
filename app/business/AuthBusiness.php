<?php

namespace MC\Business;
use MC\DataAccess\UserDaoMySql;
use MC\DataAccess\RoleDaoMySql;
use MC\Helpers\Enums\Permissions;
use MC\Helpers\Errors\RedirectException;

class AuthBusiness{
    private UserDaoMySql $userDao;
    private RoleDaoMySql $roleDao;
    
    public function __construct()
    {
        $this->userDao = new UserDaoMySql();
        $this->roleDao = new RoleDaoMySql();
    }

    /**
     * Login function
     */

    public function authenticate(array $data){
        $email = $data['email'];
        $password = $data['password'];
        $user = $this->userDao->findByEmail($email);

        if(!empty($user) and password_verify($password,$user->getPassword())){
            $_SESSION['id_user'] = $user->getId();
            $_SESSION['id_role'] = $user->getIdRole();
            return true;
        }
        return false;
    }
    
    /**
     * Check if session's user has permission for an action
     * Use enums found on  /app/helpers/enums/permissions.php
     */
    public function authPermission(Permissions $req_permission){
        if(!isset($_SESSION['id_role'])){return false;}
        $role = $this->roleDao->find($_SESSION['id_role']);
        return $role->getPermissionLevel() >= $req_permission->value;
    }

    public function authAdminSite(){
        $logged = isset($_SESSION['id_user']);
        if(!$logged){
            header("location: ./../front/login.php");
            die;
        }
        $permission = $this->authPermission(Permissions::ADMIN);
        if(!$permission){
            header("location: ./../front/403.php");
            die;
        }
        return true;
    }

    public function authPrivateEndUserSite(){
        $logged = isset($_SESSION['id_user']);
        if(!$logged){
            header("location: login.php");
            die;
        }
        return true;
    }

    public function login(array $data){
        if(!($this->authenticate($data) && isset($data['password']) && isset($data['email']))){
            throw new RedirectException('login.php',"Email o contraseña incorrecto(s)",401);
        }
        header("location: index.php");
    }

    public function logout(){
        unset($_SESSION['id_user']);
        unset($_SESSION['id_role']);
    }

}
