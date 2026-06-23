<?php
    if (! function_exists('active_if')) {
        function active_if(string $uri): string
        {
            return if_uri_is($uri, then: 'navbar-link-active');
        }
    }
?>

<header class="banner">
    <nav class="navbar">
        <ul class="navbar-list">
            <li>
                <a class="navbar-link <?= active_if('/') ?>" href="/">
                    Home
                </a>
            </li>
            <li>
                <a class="navbar-link <?= active_if('/about') ?>" href="/about">
                    About
                </a>
            </li>
            <li>
                <a class="navbar-link <?= active_if('/notes') ?>" href="/notes">
                    Notes
                </a>
            </li>
        </ul>
    </nav>
    <div class="banner-right">
        <?php if ($_SESSION['user'] ?? false): ?>
            <form method="POST" action="/logout">
                <input type="hidden" name="_method" value="DELETE">
                <button class="navbar-link account-btn">Log Out</button>
            </form>
        <?php else: ?>
            <a class="navbar-link account-btn" href="/register">Register</a>
            <a class="navbar-link account-btn" href="/login">Log In</a>
        <?php endif; ?>
    </div>
</header>
