<?php
// vista: pelicula.php

require __DIR__ . '/../dataAccess/conn.php';

if(!isset($_GET['id'])){
    echo file_get_contents('404.php');
    die;
}
$id = $_GET['id'];

// Preparo el stament
$stmt = $pdo->prepare('SELECT * FROM peliculas WHERE id = ?');

// Lo ejecuto
$stmt->execute([$id]);

// Lo recupero
$pelicula = $stmt->fetch(PDO::FETCH_OBJ);

