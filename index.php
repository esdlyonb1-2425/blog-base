<?php
echo "coucou";
$host ="127.0.0.1";
$port = "3306";
$database = "blog-base";
$username = "blog-base-admin";
$password = "blog-base-admin";


$pdo = new PDO("mysql:host=localhost;dbname=$database", $username, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$query = $pdo->query("SELECT * FROM articles");
$articles = $query->fetchAll();

var_dump($articles);