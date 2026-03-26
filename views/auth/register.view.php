<?php partial('head', ['title' => 'Register']); ?>

<!-- I WILL REFACTOR THIS!!! -->
<main class="content-centered">
    <form class="auth-form" method="POST" action="/register">
        <h1 class="auth-form-title">Register</h1>

        <div class="auth-form-field">
            <label for="email" class="register-form-field-label">Email</label>
            <input id="email" type="email" name="email" required>
        </div>

        <div class="auth-form-field">
            <label for="password" class="register-form-field-label">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div class="auth-form-field">
            <label for="name" class="register-form-field-label">Name</label>
            <input id="name" type="text" name="name" required>
        </div>

        <button class="btn btn-primary" type="submit">Register</button>
    </form>
</main>
