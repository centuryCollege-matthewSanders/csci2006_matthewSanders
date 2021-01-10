<?php

require_once('util.php');
require_once('staticPages.php');
require_once('user.php');
require_once('artwork.php');
require_once('artist.php');

$title = 'Unknown';
$body = '404 Error';

$currentUser = null;

/* Check for forms */
if (isset($_GET['form'])) {
    switch ($_GET['form']) {
        case 'user':
            $currentUser = Client::handleForm($_POST['user']);
            $_GET['pg'] = 'acct';
            break;
    }
}


switch ($_GET['pg']) {
    case 'acct':
        if ($currentUser == null) {
            $currentUser = new Client((isset($_SESSION['user']))?$_SESSION['user']:null);
        }
        $title = $currentUser->getTitle();
        $body = $currentUser->getInfoPage();
        break;
    case 'artwork':
        $artwork = new Artwork(1);
        $title = $artwork->getTitle();
        $body = $artwork->getInfoPage();
        break;
    case 'about':
        $title = 'About Us';
        $body = getAboutUs();
        break;
    case 'artist':
        $artist = new Artist(1);
        $title = $artist->getTitle();
        $body = $artist->getInfoPage();
        break;
    default:
    case 'home':
        $title = 'Art Shop';
        $body = getHomepage();
        break;
}

$userNav = buildNavigation(array(
        'acct'=>'My Account',
        'wish'=>'Wishlist',
        'cart'=>'Shopping Cart',
    ), 'user');
$mainNav = buildNavigation(array(
        'home'=>'Home',
        'about'=>'About Us',
        'artwork'=>'Artworks',
        'artist'=>'Artists',
    ));


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
        {$userNav}
        <h1>Art Store</h1>
        {$mainNav}
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
