<?php
$fenom->addModifier('phone', function ($input) {
    $p1 = array(" ", "-", "(", ")");
    $p2 = array("", "", "", "");
    return str_replace($p1, $p2, $input);
});