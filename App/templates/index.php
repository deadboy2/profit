<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        div.block {
            border: 1px gray solid;
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
<?php foreach($news as $art): ?>
<div class="block">
    News Title: <?= $art->title ?><br>
    News Text: <?= $art->text ?><br>
    <?php if(!empty($art->author)): ?><br>
    News Author Name: <?= $art->author->name ?><br>
    News Author Surname: <?= $art->author->surname ?><br>
    <?php endif; ?>
</div>
<?php endforeach; ?>
</body>
</html>