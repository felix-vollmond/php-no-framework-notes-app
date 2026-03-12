<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Note</h1>
    <div class="form-container">
        <p class="note-text"><?= htmlentities($note['body']) ?></p>
        <div class="action-bar">
            <a class="btn btn-back" href="/notes">Back</a>
            <form action="/note" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <input class="btn btn-delete" type="submit" value="Delete">
            </form>
            <a class="btn btn-primary" href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
        </div>
    </div>
</main>

<?php partial('footer'); ?>
