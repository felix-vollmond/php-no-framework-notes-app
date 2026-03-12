<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Edit Note</h1>
    <div class="form-container">
        <form id="edit-note-form" action="/note" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <textarea name="body" rows="7"><?= htmlentities($note['body']) ?></textarea>
        </form>
        <div class="action-bar">
            <a class="btn btn-back" href="/note?id=<?= $note['id'] ?>">Cancel</a>
            <input class="btn btn-primary" form="edit-note-form" type="submit" value="Save">
        </div>
    </div>
</main>

<?php partial('footer'); ?>
