<?php partial('head', ['title' => 'Notes App']); ?>
<?php partial('nav'); ?>

<main class="content">
    <h1 class="content-title">Notes</h1>
    <p>Welcome, <?= e($user) ?></p>
</main>

<?php partial('footer'); ?>
