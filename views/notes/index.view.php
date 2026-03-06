<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<body>
    <?php include dirname(__DIR__) . '/partials/nav.partial.php'; ?>
    <h1>Notes</h1>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li><i><?= $note ?></i></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
