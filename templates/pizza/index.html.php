<h1>les pizzas</h1>

<?php foreach ($pizzas as $pizza): ?>

    <hr>
    <p><strong>La pizza numero <?= $pizza->getId() ?></strong> : la pizza <?= $pizza->getName() ?></p>

    <hr>



<?php endforeach; ?>