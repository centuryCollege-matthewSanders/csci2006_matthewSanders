<?php

function getDB() {
    /* TODO */
}

function formatUSD($v) {
    return sprintf('$%d.%02d',intval($v),($v*100)%100);
}

?>
