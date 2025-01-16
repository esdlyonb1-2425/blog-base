<?php
session_start();

require_once("logique/requetes.php");


$id =null;
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
}

if(!$id){
    header('Location: index.php');
}

$article = getArticle($id);

if(!$article){
    header('Location: index.php');
    exit();
}

deleteArticle($article['id']);

header('Location: index.php');
exit();

?>
