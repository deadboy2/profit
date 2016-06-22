<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<ul>
    <?php foreach($news as $item): ?>
    <li><?= $item->title ?></li>
    <li><?= $item->text ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>