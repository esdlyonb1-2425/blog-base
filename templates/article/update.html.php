<form action="" method="post">
    <input value="<?= $article['title'] ?>" placeholder="votre titre" type="text" name="title" >
    <br>
    <textarea placeholder="votre article" name="content" id="" cols="30" rows="10"><?= $article['content'] ?></textarea>
    <br>
    <button type="submit">Poster</button>
</form>