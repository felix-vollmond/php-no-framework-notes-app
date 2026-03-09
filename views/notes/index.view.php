<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<body>
    <?php partial('nav'); ?>
    <h1>Notes</h1>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="/note/edit?id=<?= $note['id'] ?>">
                    <?= htmlentities($note['body']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/notes/create">Create Note</a>
</body>
</html>
