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


    //methodes suivantes : create, update, delete


}