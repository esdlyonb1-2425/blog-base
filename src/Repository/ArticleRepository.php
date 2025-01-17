<?php

namespace Repository;



use Database\Database;
use Entity\Article;

class ArticleRepository
{

    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo =  Database::getPdo();
    }


    public function findAllArticles() : array
    {
        $query = $this->pdo->prepare("SELECT * FROM articles");
        $query->execute();
        $articles = $query->fetchAll();
        return $articles;
    }

    public function findArticle(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $query->execute([
            "id"=> $id
        ]);
        $article = $query->fetch();
        return $article;
    }

}