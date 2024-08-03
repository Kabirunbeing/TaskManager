<?php

$shit = ['arrays', 'are', 'shit'];

$uppercased = array_map(function($shits) {
    print_r(strtoupper($shits));
}, $shit);
