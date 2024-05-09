<?php

require __DIR__ . '/../dataAccess/conn.php';


if(isset($_GET['fecha'])){

    //sentencia con LIKE
    // $fecha = $_GET['fecha'] .'-%';
    // $stmt = $pdo->prepare('SELECT * FROM peliculas WHERE estreno LIKE :fecha');
    // $stmt -> execute([
    //     ':fecha' =>  $fecha
    // ]);
    //sentencia con rangos
    $fecha = $_GET['fecha'];
    $fecha_min = $fecha . '-01-01';
    $fecha_max = $fecha . '-12-31';
    $stmt = $pdo->prepare('SELECT * FROM peliculas WHERE estreno >= :fecha_min AND estreno <= :fecha_max');
    $stmt -> execute([
        ':fecha_min' => $fecha_min,
        ':fecha_max' => $fecha_max
    ]);
    

}


else{
    $stmt = $pdo->prepare('SELECT * FROM peliculas');
    $stmt->execute();
}

// Lo recupero
$peliculas = $stmt->fetchAll(PDO::FETCH_OBJ);