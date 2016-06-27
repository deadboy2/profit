<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 error</title>
    <style>
        div.error-block {
            min-height: 10px;
            max-width: 500px;
            border: 1px gray dashed;
        }
        p {
            background: lightcoral;
        }
    </style>
</head>
<body>
<div class="error-block">
    <p>Message: <?= $error->getMessage(); ?></p>
</div>
</body>
</html>