<h1>les pizzas</h1>

<?php foreach ($pizzas as $pizza): ?>

    <hr>
    <p><strong>La pizza numero <?= $pizza["id"] ?></strong> : la pizza <?= $pizza["name"] ?></p>

    <hr>



<?php endforeach; ?>