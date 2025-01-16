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

$query = $pdo->query("SELECT * FROM articles");
$articles = $query->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<?php if(!empty($_GET["message"])){ ?>

    <hr>
    <hr>
    <?= $_GET["message"] ?>

    <hr>
    <hr>
<?php } ?>
<hr>
<a href="index.php">Accueil</a>

<a href="new-article.php">nouvel article</a>
<a href="signIn.php">Sign In</a>
<a href="signUp.php">Sign Up</a>
<a href="signOut.php">Sign Out</a>
<h4><?php
    if(!empty($_SESSION["username"])){
        echo $_SESSION["username"];
    }

    ?></h4>
<hr>
<?php foreach ($articles as $article): ?>

    <hr>
    <div class="article">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['content'] ?></p>
        <a href="article.php?id=<?= $article['id'] ?>">Lire</a>
        <a href="updateArticle.php?id=<?= $article['id'] ?>">modifier</a>
        <a href="deleteArticle.php?id=<?= $article['id'] ?>">supprimer</a>
    </div>
    <hr>

<?php endforeach; ?>




</body>
</html>
