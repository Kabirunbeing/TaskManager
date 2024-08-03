
<?php
$Associative = [
    'name' => 'kabeer',
    'age' => 25,
    'address' => 'gandhi nagar, bangalore',
    'hobbies' => ['reading', 'painting', 'cooking']
];

function toUppercase($value) {
    return is_array($value) ? array_map('toUppercase', $value) : strtoupper($value);
}

$uppercaseAssociative = array_map('toUppercase', $Associative);

print_r($uppercaseAssociative);
?>