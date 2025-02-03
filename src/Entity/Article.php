<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'articles')]
#[TargetRepository(repoName: ArticleRepository::class)]
class Article
{
    private int $id;
    private string $title;
    private string $content;
    private int $user_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }


}