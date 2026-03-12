<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Notes</h1>
    <ul>
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>">
                    <?= htmlentities($note['body']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a class="btn btn-primary" href="/notes/create">Create Note</a>
</main>

<?php partial('footer'); ?>
