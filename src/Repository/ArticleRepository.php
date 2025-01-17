<?php

namespace Repository;



use Database\Database;

class ArticleRepository extends Repository
{


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

    public function deleteArticle(array $article) : void
    {
        $deleteQuery = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        $deleteQuery->execute([
            "id"=> $article['id']
        ]);

    }

    public function addArticle(array $article) : int
    {

        $query = $this->pdo->prepare("INSERT INTO articles (title, content, user_id) VALUES(:title, :content, :user_id)");
        $query->execute([
            'title' => $article['title'],
            'content' => $article['content'],
            'user_id' => $article['user_id']
        ]);

        $id = $this->pdo->lastInsertId();
        return $id;
    }

}