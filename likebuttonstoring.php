<?php
// Get raw POST data
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// Check if valid data
if (!isset($data['id']) || !isset($data['type'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Extract values
$postId = $data['id'];
$type = $data['type']; // 1 = like, 0 = dislike

// TODO: Update  storage JSON file
// Define the file path
$filePath = 'guestbook.json';


if ($data === 0) {
    
}

// Read existing messages
if (file_exists($filePath)) {
    $data_msg = json_decode(file_get_contents($filePath), true);
} else {
    $data_msg = [];
}


// Return response
echo json_encode([
    $type
]);
?>