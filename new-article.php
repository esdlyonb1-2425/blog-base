<?php
session_start();

require_once "src/Repository/Repository.php";
require_once "src/Controller/UserController.php";
require_once "src/Repository/UserRepository.php";

require_once "src/Controller/ArticleController.php";
require_once "src/Repository/ArticleRepository.php";
require_once "core/Database/Database.php";
require_once "core/View/Vfunction getArticles(): array
{
    $query = getPdo()->prepare("SELECT * FROM articles");
    $query->execute();
    $articles = $query->fetchAll();
    return $articles;
}

/**
 * @param $id
 * @return array $article
 */
function getArticle($id) : array | false
{
    $query = getPdo()->prepare("SELECT * FROM articles WHERE id = :id");
    $query->execute([
        "id"=> $id
    ]);
    $article = $query->fetch();
    return $article;
}

function deleteArticle($id) : int
{
    $deleteQuery = getPdo()->prepare("DELETE FROM articles WHERE id = :id");
    $deleteQuery->execute([
        "id"=> $id
    ]);
    return $id;
}

function addArticle($article) : int
{
    $query = getPdo()->prepare("INSERT INTO articles (title, content, user_id) VALUES(:title, :content, :user_id)");
    $query->execute([
        'title' => $article['title'],
        'content' => $article['content'],
        'user_id' => $article['user_id']
    ]);

    $id = getPdo()->lastInsertId();
    return $id;
}

function updateArticle($article) : int
{
    $updateQuery = getPdo()->prepare(
        "UPDATE articles SET title = :title, content = :content WHERE id = :id"
    );

    $updateQuery->execute([
        "title" => $article['title'],
        "content" => $article['content'],
        "id" => $article['id']
    ]);
    return $article['id'];
}


/// Users

function getUserByUsername($username) : array| bool
{
    $query = getPdo()->prepare("SELECT * FROM users WHERE username = :username");
    $query->execute([
        "username"=> $username
    ]);
    $user = $query->fetch();
    return $user;
}
iew.php";
require_once "core/Response/Response.php";

$controller = new \Controller\ArticleController();
$controller->addArticle();