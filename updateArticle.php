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
    exit();
}

$title = null;
$content=null;

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

}

if($title && $content){
    $updateQuery = $pdo->prepare(
            "UPDATE articles SET title = :title, content = :content WHERE id = :id"
    );

    $updateQuery->execute([
            "title" => $title,
            "content" => $content,
            "id" => $id
    ]);

    header('Location: article.php?id='.$id);
    exit();
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
<form action="updateArticle.php?id=<?= $article['id'] ?>" method="post">
    <input value="<?= $article['title'] ?>" placeholder="votre titre" type="text" name="title" >
    <br>
    <textarea placeholder="votre article" name="content" id="" cols="30" rows="10"><?= $article['content'] ?></textarea>
    <br>
    <button type="submit">Poster</button>
</form>


<hr>
</body>
</html>
