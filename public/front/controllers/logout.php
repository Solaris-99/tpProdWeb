<?php
session_start();
require_once __DIR__ . '/../../app/business/AuthBusiness.php';

$auth = new AuthBusiness();
$auth->logout();
header('location: ../index.php');