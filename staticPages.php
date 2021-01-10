<?php

function getAboutUs() {
    return '<h2>Art Shop Story</h2>'.
        '<p>Started as a project for a class at Century College,'.
        ' this Art Shop has expanded to include a variety of features.'.
        ' Though most of the features come from having to complete some kind of assignment,'.
        ' and often focus on some kind of programming task, the Art Shop has thrived'.
        ' as a location for art enthusiasts to gather, and collect artworks</p>'.
        ' <br />'.
        '<h2>Contact us</h2>'.
        '<p>The best way for you to contact the Art Shop is by mailing a postcard'.
        ' to Century College, Attn: Art Shop</p>';
}

function getHomepage() {
    $art = Artwork::getRandom();
    return '<center><h2>Art of the Day</h2>'.$art->getPreview().'</center>';
}

?>
