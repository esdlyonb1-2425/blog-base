<?php


$username = null;
$password=null;

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

}


if($username && $password){

    require_once("logique/requetes.php");


    $user = getUserByUsername($username);

    if($user){
        header('Location: signUp.php?message=Username already taken');
        exit();
    }

     $newUser = ["username" => $username, "password" => $password];
     addUser($newUser);

     header('Location: index.php?message=Successfully registered');
     exit();
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
<?php if(!empty($_GET["message"])){ ?>

    <hr>
    <hr>
    <?= $_GET["message"] ?>

    <hr>
    <hr>
<?php } ?>
<h3>Register</h3>

<form  method="post">
    <input type="text" name="username" id=""><br>
    <input type="password" name="password" id=""><br>
    <button type="submit">sign up</button>
</form>


</body>
</html>