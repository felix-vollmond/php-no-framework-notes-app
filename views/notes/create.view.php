<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<body>
    <?php partial('nav'); ?>
    <h1>Create Note</h1>
    <form action="/notes" method="POST">
        <textarea name="body"></textarea>
        <input type="submit" value="Create">
    </form>
    <a href="/notes">Back</a>
</body>
</html>
