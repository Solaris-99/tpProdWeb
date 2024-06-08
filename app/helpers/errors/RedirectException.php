<?php
namespace MC\Helpers\Errors;
use Exception;

class RedirectException extends Exception{
    private string $header;
    private string $modal;

    public function __construct($header, $message = "", $code = 500){
        parent::__construct($message,$code);
        $this->header = $header;
    }

    public function redirect(): void{
        echo $this->header;
        header("location: $this->header");
        die;
    }

}