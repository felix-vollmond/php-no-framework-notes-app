<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Edit Note</h1>
    <div class="note-container">
        <form id="edit-note-form" action="/note" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= e($note['id']) ?>">
            <?php partial('note-textarea', ['body' => $note['body']]); ?>
        </form>
        <div class="action-bar">
            <a class="btn btn-back" href="/note?id=<?= e($note['id']) ?>">Cancel</a>
            <input class="btn btn-primary" form="edit-note-form" type="submit" value="Save">
        </div>
    </div>
</main>

<?php partial('footer'); ?>
