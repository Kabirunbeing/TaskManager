<?php

$shit = ['arrays', 'are', 'shit'];

$uppercased = array_map(function($shits) {
    print_r(strtoupper($shits));
}, $shit);

$iwillBe = ["filter", 'method'];

$filteredArray = array_filter($iwillBe, function($item) {
    return strtolower($item) === 'filter';
});

print_r($filteredArray);
?>
