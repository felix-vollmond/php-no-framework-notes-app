<?php partial('head'); ?>
<?php partial('nav'); ?>

<main class="content">
    <h1 class="content-title">Create Note</h1>
    <div class="note-container">
        <form id="create-note-form" action="/notes" method="POST">
            <?php partial('note-textarea'); ?>
        </form>
        <div class="btn-container">
            <a class="btn btn-secondary" href="/notes">Back</a>
            <input class="btn btn-primary" form="create-note-form" type="submit" value="Create">
        </div>
    </div>
</main>

<?php partial('footer'); ?>
