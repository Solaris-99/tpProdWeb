<?php
require_once __DIR__ . '/../helpers/errors/RedirectException.php';

function handleException(Throwable $e){
    if($e instanceof RedirectException){
        $e->redirect();
    }
    else{
        echo $e->getTraceAsString();
        echo $e->getMessage();
    }
}

set_exception_handler('handleException');