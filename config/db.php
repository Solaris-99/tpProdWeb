<?php 
$username = 'root';
$password = '';
$dbname = 'movies';
$port = '3306';
$host = '127.0.0.1';
$engine = 'mysql';

try{
    $dsn = "$engine:dbname=$dbname;host=$host;port=$port";
    $con = new PDO($dsn,$username,$password);
}
catch (PDOException $e){
    echo $e->getMessage(); //TODO: kill webpage
}