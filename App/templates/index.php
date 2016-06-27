<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>

<?php foreach($news as $article): ?>
<ul>
    <li><?= $article->text ?></li>
    <li><?= $article->author->name ?></li>
</ul>
<?php endforeach; ?>

</body>
</html>