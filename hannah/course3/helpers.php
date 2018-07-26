<?php
//helper functions for finding portions of strings
function after ($thing, $inthat)
{
    if (!is_bool(strpos($inthat, $thing)))
    return substr($inthat, strpos($inthat,$thing)+strlen($thing));
};

function after_last ($thing, $inthat)
{
    if (!is_bool(strrevpos($inthat, $thing)))
    return substr($inthat, strrevpos($inthat, $thing)+strlen($thing));
};

function before ($thing, $inthat)
{
    return substr($inthat, 0, strpos($inthat, $thing));
};

function before_last ($thing, $inthat)
{
    return substr($inthat, 0, strrevpos($inthat, $thing));
};

function between ($thing, $that, $inthat)
{
    return before ($that, after($thing, $inthat));
};

function between_last ($thing, $that, $inthat)
{
 return after_last($thing, before_last($that, $inthat));
};

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};


?>