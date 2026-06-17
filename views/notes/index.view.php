<?php
    /** @var array $notes */
?>

<?php partial('head', ['title' => 'Notes']); ?>
<?php partial('banner'); ?>

<main class="content">
    <h1 class="content-title">Notes</h1>
    <ul class="notes-list">
        <?php foreach ($notes as $note): ?>
            <li>
                <a class="notes-link" href="/notes/<?= e($note['id']) ?>">
                    <?= e($note['body']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a class="btn btn-primary" href="/notes/create">Create Note</a>
</main>

<?php partial('footer'); ?>
