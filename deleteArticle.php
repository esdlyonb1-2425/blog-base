<?php
session_start();

$host ="127.0.0.1";
$port = "3306";
$database = "blog-base";
$dbUsername = "blog-base-user";
$dbPassword = "blog-base-user";

$pdo = new PDO("mysql:host=$host:$port;dbname=$database", $dbUsername, $dbPassword, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$id =null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if(!$id){
    header('Location: index.php');
}


$query = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
$query->execute([
        "id"=> $id
]);
$article = $query->fetch();

if(!$article){
    header('Location: index.php');
    exit();
}

$deleteQuery = $pdo->prepare("DELETE FROM articles WHERE id = :id");
$deleteQuery->execute([
        "id"=> $id
]);
header('Location: index.php');
exit();

?>
