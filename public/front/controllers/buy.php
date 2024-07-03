<?php
require_once __DIR__.'/../../../vendor/autoload.php';
session_start();
use MC\Business\AuthBusiness;
use MC\Business\MovieUserBusiness;

$auth = new AuthBusiness();
$header = "login.php";

if($auth->authPrivateEndUserSite() && isset($_POST["id_movie"])){
    $movie_id = $_POST["id_movie"];
    $movieUserBusiness = new MovieUserBusiness;
    $movieUserBusiness->buy($movie_id, $_SESSION["id_user"]);
    $header = "movie.php?id=$movie_id";
}

header("location: ../$header");