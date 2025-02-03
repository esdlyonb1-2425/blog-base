<div class="article">
    <h3><?= $article['title'] ?></h3>
    <p><?= $article['content'] ?></p>
    <p>Auteur :  <?= $article['user_id'] ?></p>
    <a href="">Modifier</a>
    <a href="?type=article&action=delete&id=<?= $article['id'] ?>">supprimer</a>


    <a href="?type=article&action=index">Retour</a>
</div>