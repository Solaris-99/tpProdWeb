<?php
use MC\Helpers\Errors\RedirectException;
use MC\Business\AuthBusiness;
use MC\Helpers\Enums\Permissions;

function handleException(Throwable $e){
    $auth = new AuthBusiness;
    $adminErrorPage = '.\..\..\public\admin\error.php';
    $userErrorPage = '.\..\..\public\front\500.php';

    if($e instanceof RedirectException){
        $e->redirect();
    }
    else{
        //TODO: if authAdminSite->true then ->redirect to exception.php, show error // else -> redirect 500.
        $header = '';
        if($auth->authPermission(Permissions::ADMIN)){
            $_SESSION['detailed_error'] = $e->getTraceAsString(). "\n" . $e->getMessage();
            $header = $adminErrorPage; 
        }
        else{
            $header = $userErrorPage;
        }
        header("location: $header");

    }
}

set_exception_handler('handleException');