<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<body>
    <?php partial('nav'); ?>
    <h1>Edit Note</h1>
    <form action="/note" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <textarea name="body"><?= htmlentities($note['body']) ?></textarea>
        <input type="submit" value="Save">
    </form>
    <form action="/note" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input type="submit" value="Delete">
    </form>
    <a href="/notes">Back</a>
</body>
</html>
