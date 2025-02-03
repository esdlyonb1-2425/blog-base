<?php foreach ($articles as $article): ?>

    <hr>
    <div class="article">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['content'] ?></p>
        <a href="?type=article&action=show&id=<?= $article['id'] ?>">Lire</a>
        <a href="">modifier</a>
        <a href="?type=article&action=delete&id=<?= $article['id'] ?>">supprimer</a>
    </div>
    <hr>

<?php endforeach;
