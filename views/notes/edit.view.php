<?php partial('head'); ?>
<?php partial('nav'); ?>

<main class="content">
    <h1 class="content-title">Edit Note</h1>
    <div class="note-container">
        <form id="edit-note-form" action="/note" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= e($note['id']) ?>">
            <?php partial('note-textarea', ['body' => $note['body']]); ?>
        </form>
        <div class="btn-container">
            <a class="btn btn-secondary" href="/note?id=<?= e($note['id']) ?>">Cancel</a>
            <input class="btn btn-primary" form="edit-note-form" type="submit" value="Save">
        </div>
    </div>
</main>

<?php partial('footer'); ?>
