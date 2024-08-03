<?php
// recursion
function learn($kabeer, $count = 0, $maxCount = 10) {
    if ($count >= $maxCount) {
        return [
            'status' => 'error',
            'message' => 'Maximum recursion limit reached'
        ];
    }

    if ($kabeer === "Kabeer" || $kabeer === "abeer") {
        return [
            'status' => 'success',
            'message' => 'I am alive'
        ];
    }

    if ($kabeer === "beer") {
        return [
            'status' => 'error',
            'message' => 'I don\'t like beer'
        ];
    }

    return learn(strtoupper($kabeer), $count + 1);
}

// Example usage in an API endpoint
$response = learn("Kabeer");
header('Content-Type: application/json');
echo json_encode($response);