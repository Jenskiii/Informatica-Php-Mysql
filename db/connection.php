<?php
$host = 'localhost';
$db = 'ledenadministratie';
$user = 'root';
$pass = '';
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$db;charset=$chrs";

// connect to mysql with PDO
try {
    $pdo = new PDO($attr, $user, $pass);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Oeps something is wrong- ". $e->getMessage();
    throw new PDOException($e->getMessage());
}

