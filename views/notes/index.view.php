<?php partial('head'); ?>
<?php partial('nav'); ?>

<main class="content">
    <h1 class="content-title">Notes</h1>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="/note?id=<?= e($note['id']) ?>">
                    <?= e($note['body']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a class="btn btn-primary" href="/notes/create">Create Note</a>
</main>

<?php partial('footer'); ?>
