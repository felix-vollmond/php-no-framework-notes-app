<?php partial('head'); ?>
<?php partial('nav'); ?>

<main>
    <h1>Create Note</h1>
    <form action="/notes" method="POST">
        <textarea name="body"></textarea>
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
    <a class="btn btn-back" href="/notes">Back</a>
</main>

<?php partial('footer'); ?>
