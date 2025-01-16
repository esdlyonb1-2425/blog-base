<?php
$host ="127.0.0.1";
$port = "3306";
$database = "blog-base";
$username = "blog-base-user";
$password = "blog-base-user";

$pdo = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password, [
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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<hr>
<a href="new-article.php">nouvel article</a>
<hr>
<hr>
<div class="article">
    <h3><?= $article['title'] ?></h3>
    <p><?= $article['content'] ?></p>
    <a href="index.php">Retour</a>
</div>
<hr>
</body>
</html>
