<?php

require_once __DIR__.'/../dataAccess/UserDaoMySql.php';
require_once __DIR__.'/../dataAccess/RoleDaoMySql.php';
require_once __DIR__.'/../helpers/enums/permissions.php';

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
        $head = 'login.php';
        if($this->authenticate($data) && isset($data['password']) && isset($data['email'])){
            $head = 'index.php';
        }
        
        header("location: $head");
    }

    public function logout(){
        unset($_SESSION['id_user']);
        unset($_SESSION['id_role']);
    }

}
