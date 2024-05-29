<?php

// Fonction pour comparer 2 éléments
// arr = [0, 1, 5]
// a = 1
// b = 0
function cmp($a, $b)
{
    if ($a < $b) {
        return -1;
    } else if ($a > $b) {
        return 1;
    } else {
        return 0;
    }
}

// Fonction pour comparer 2 name
function cmpName($i, $j)
{
    $a = $i["name"];
    $b = $j["name"];
    if ($a < $b) {
        return -1;
    } else if ($a > $b) {
        return 1;
    } else {
        return 0;
    }
}

// Fonction pour comparer 2 age
function cmpAge($i, $j)
{
    $a = $i["age"];
    $b = $j["age"];
    if ($a < $b) {
        return -1;
    } else if ($a > $b) {
        return 1;
    } else {
        return 0;
    }
}

$arr = array(
    array("name" => "Mathias", "age" => 29),
    array("name" => "Adrien", "age" => 37),
    array("name" => "Clement", "age" => 34),
    array("name" => "Kevin", "age" => 32),
    array("name" => "Laetitia", "age" => 51),
    array("name" => "Charles", "age" => 26)
);

function cmpAge2($a, $b)
{
    $a = $a["age"];
    $b = $b["age"];
    if ($a < $b) {
        return -1;
    } else if ($a > $b) {
        return 1;
    } else {
        return 0;
    }
}

usort($arr, "cmpAge2");

foreach ($arr as $a) {
    echo implode(" : ", $a) . "\n";
}
