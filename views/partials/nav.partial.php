<?php
    function active_if($uri)
    {
        return if_uri_is($uri, then: 'navbar-link-active');
    }
?>

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
