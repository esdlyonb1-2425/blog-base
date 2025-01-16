<div class="article">
    <h3><?= $article['title'] ?></h3>
    <p><?= $article['content'] ?></p>
    <p>Auteur :  <?= $article['user_id'] ?></p>
    <a href="updateArticle.php?id=<?= $article['id'] ?>">Modifier</a>
    <a href="deleteArticle.php?id=<?= $article['id'] ?>">supprimer</a>


    <a href="index.php">Retour</a>
</div>