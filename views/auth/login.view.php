<?php partial('head', ['title' => 'Login']); ?>

<!-- I WILL REFACTOR THIS!!! -->
<main class="content-centered">
    <form class="auth-form" method="POST" action="/login">
        <h1 class="auth-form-title">Login</h1>

        <div class="auth-form-field">
            <label for="email" class="register-form-field-label">Email</label>
            <input id="email" type="email" name="email" required>
        </div>

        <div class="auth-form-field">
            <label for="password" class="register-form-field-label">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button class="btn btn-primary" type="submit">Login</button>
    </form>
</main>
