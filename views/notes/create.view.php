<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Create Note</h1>
    <div class="form-container">
        <form id="create-note-form" action="/notes" method="POST">
            <textarea name="body" rows="7"></textarea>
        </form>
        <div class="action-bar">
            <a class="btn btn-back" href="/notes">Back</a>
            <input class="btn btn-primary" form="create-note-form" type="submit" value="Create">
        </div>
    </div>
</main>

<?php partial('footer'); ?>
