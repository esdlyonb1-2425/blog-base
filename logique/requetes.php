<?php
require_once 'database.php';
function getArticles(): array
{
    $query = getPdo()->query("SELECT * FROM articles");
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

function getUserByUsername($username) : array
{
    $query = getPdo()->prepare("SELECT * FROM users WHERE username = :username");
    $query->execute([
        "username"=> $username
    ]);
    $user = $query->fetch();
    return $user;
}

function addUser($user) : int
{
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

    $query = getPdo()->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $query->execute([
        "username"=> $user['username'],
        "password"=> $user['password']
    ]);

    return getPdo()->lastInsertId();
}