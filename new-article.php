<?php
session_start();
if(empty($_SESSION["id"])){

    header("Location: login.php?message=please log in first");
    exit();
}

$title = null;
$content=null;

if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

}


if($title && $content){

    $host ="127.0.0.1";
    $port = "3306";
    $database = "blog-base";
    $dbUsername = "blog-base-user";
    $dbPassword = "blog-base-user";

    $pdo = new PDO("mysql:host=$host:$port;dbname=$database", $dbUsername, $dbPassword, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $query = $pdo->prepare("INSERT INTO articles (title, content, user_id) VALUES(:title, :content, :user_id)");
    $query->execute([
        'title' => $title,
        'content' => $content,
        'user_id' => $_SESSION["id"]
    ]);

    $id = $pdo->lastInsertId();
    header('Location: article.php?id='.$id);

}



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
<form method="post">
    <input placeholder="votre titre" type="text" name="title" >
    <br>
    <textarea placeholder="votre article" name="content" id="" cols="30" rows="10"></textarea>
    <br>
    <button type="submit">Poster</button>
</form>



</body>
</html>