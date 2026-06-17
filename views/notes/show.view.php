<?php
    /** @var array $note */
?>

<?php partial('head', ['title' => "Note #{$note['id']}"]); ?>
<?php partial('banner'); ?>

<main class="content">
    <h1 class="content-title">Note</h1>
    <div class="note-container">
        <p class="note-text"><?= e($note['body']) ?></p>
        <div class="btn-container">
            <a class="btn btn-secondary" href="/notes">Back</a>
            <form action="/notes/<?= e($note['id']) ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
            <a class="btn btn-primary" href="/notes/<?= e($note['id']) ?>/edit">Edit</a>
        </div>
    </div>
</main>

<?php partial('footer'); ?>
