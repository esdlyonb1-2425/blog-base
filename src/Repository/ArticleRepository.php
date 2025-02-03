<?php

namespace App\Repository;


use Attributes\TargetEntity;
use Core\Repository\Repository;
use App\Entity\Article;

#[TargetEntity(entityName: Article::class)]
class ArticleRepository extends Repository
{





    public function addArticle(Article $article) : int
    {

        $query = $this->pdo->prepare("INSERT INTO $this->tableName (title, content, user_id) VALUES(:title, :content, :user_id)");
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'user_id' => $article->getUserId(),
        ]);

        $id = $this->pdo->lastInsertId();
        return $id;
    }

}