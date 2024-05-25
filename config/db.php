<?php 


$username = 'root';
$password = '';
$dbname = 'movies';
$port = '3306';
$host = '127.0.0.1';
$engine = 'mysql';
$dsn = "$engine:dbname=$dbname;host=$host;port=$port";

try{
    $con = new PDO($dsn,$username,$password);
}
catch (PDOException $e){
    throw new RedirectException("unavailable.php"); //TODO: kill webpage
}