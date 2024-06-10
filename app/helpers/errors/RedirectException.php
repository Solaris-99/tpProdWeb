<?php
namespace MC\Helpers\Errors;
use Exception;

class RedirectException extends Exception{
    private string $header;

    public function __construct($header, $message = "", $code = 500){
        parent::__construct($message,$code);
        $this->header = $header;
    }

    public function redirect(): void{
        echo $this->header;
        $_SESSION['error'] = $this->message;
        header("location: $this->header");
        die;
    }

}