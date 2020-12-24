<?php

require_once('util.php');
require_once('artwork.php');

$artwork = new Artwork(1);
$title = $artwork->getTitle();
$body = $artwork->getInfoPage();

echo <<<__HTML__
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{$title}</title>
    <link rel="stylesheet" href="aux/default.css">
</head>
<body>
    <header>
        <nav class="user">
            <!-- TODO: Make dynamic -->
            <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Wish List</a></li>
                <li><a href="#">Shopping Cart</a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
        </nav>
        <h1>Art Store</h1>
        <nav>
            <ul id="second_nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Art Works</a></li>
                <li><a href="#">Artists</a></li>
            </ul>
        </nav>
    </header>
    <main>
        {$body}
    </main>
    <footer>
        <p>All images are copyright to their owners. This is just a hypothetical site &copy;2020 Copyright Art Store</p>
    </footer>
</body>
</html>
__HTML__;

?>
