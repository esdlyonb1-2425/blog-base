<?php foreach ($articles as $article): ?>

    <hr>
    <div class="article">
        <h3><?= $article->getTitle() ?></h3>
        <p><?= $article->getContent() ?></p>
        <a href="?type=article&action=show&id=<?= $article->getId() ?>">Lire</a>
        <a href="">modifier</a>
        <a href="?type=article&action=delete&id=<?= $article->getId() ?>">supprimer</a>
    </div>
    <hr>

<?php endforeach;
