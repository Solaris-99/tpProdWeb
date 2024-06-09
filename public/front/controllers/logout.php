<?php
require_once __DIR__.'/../../../vendor/autoload.php';
session_start();
use MC\Business\AuthBusiness;

$auth = new AuthBusiness();
$auth->logout();
header('location: ../index.php');