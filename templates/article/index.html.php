<?php foreach ($articles as $article): ?>

    <hr>
    <div class="article">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['content'] ?></p>
        <a href="article.php?id=<?= $article['id'] ?>">Lire</a>
        <a href="updateArticle.php?id=<?= $article['id'] ?>">modifier</a>
        <a href="deleteArticle.php?id=<?= $article['id'] ?>">supprimer</a>
    </div>
    <hr>

<?php endforeach;
