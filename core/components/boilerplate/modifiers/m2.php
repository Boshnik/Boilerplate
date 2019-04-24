<?php
$fenom->addModifier('m2', function ($input) {
    $input = str_replace('м2',"м<sup>2</sup>",$input);
    return str_replace('М2',"М<sup>2</sup>",$input);
});