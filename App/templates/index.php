<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        div.block {
            border: 1px grey solid;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>

<?php foreach ($news as $article): ?>
    <div class="block">
        <p>News Id: <?= $article->id ?></p>
        <p>News Title: <?= $article->title ?></p>
        <p>News Text: <?= $article->text ?></p>
        <?php if (!empty($article->author)): ?>
            <p>Author name: <?= $article->author->name ?></p>
            <p>Author surname: <?= $article->author->surname ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>