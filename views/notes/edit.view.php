<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Edit Note</h1>
    <form action="/note" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <textarea name="body"><?= htmlentities($note['body']) ?></textarea>
        <input class="btn btn-primary" type="submit" value="Save">
    </form>
    <form action="/note" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <input class="btn btn-delete" type="submit" value="Delete">
    </form>
    <a class="btn btn-back" href="/notes">Back</a>
</main>

<?php partial('footer'); ?>
