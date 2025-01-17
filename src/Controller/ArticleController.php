<?php

namespace Controller;

use Repository\ArticleRepository;
use Response\Response;
use View\View;

class ArticleController
{

    public function index()
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->findAllArticles();

        View::render('article/index', [
            'articles' => $articles
        ]);

    }

    public function show()
    {
        $id =null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if(!$id){

            Response::redirect();
        }

        $articleRepository = new ArticleRepository();
       $article = $articleRepository->findArticle($id);

        View::render('article/show', [
            'article' => $article
        ]);

    }

    public function delete()
    {

        $id =null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if(!$id){
            Response::redirect();
        }
        $articleRepository = new ArticleRepository();
        $article = $articleRepository->findArticle($id);

        if($article){
            $articleRepository->deleteArticle($article);
        }
        Response::redirect();

    }

    //methodes suivantes : create, update, delete


    public function addArticle()
    {
        if(empty($_SESSION["id"])){

            Response::redirect("index", ["message"=>"please log in first"]);
        }

        $title = null;
        $content=null;

        if(!empty($_POST['title']) && !empty($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

        }


        if($title && $content)
        {

            $newArticle = [
                "title" => $title,
                "content" => $content,
                "user_id" => $_SESSION["id"]
            ];

            $articleRepository = new ArticleRepository();
            $id =  $articleRepository->addArticle($newArticle);

            Response::redirect("article", ["id" => $id]);
        }

        View::render("article/new", [
            "pageTitle" => "New Article",
        ]);
    }

}