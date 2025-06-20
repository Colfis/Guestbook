<?php
// Get raw POST data
header('Content-Type: application/json');
$rawData = file_get_contents("php://input");
$postData = json_decode($rawData, true);

// Validate input
if (!isset($postData['id']) || !isset($postData['type'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Extract values
$postId = $postData['id'];
$type = $postData['type']; // 1 = like, 0 = dislike

// Define the file path
$filePath = 'guestbook.json';

// Read existing messages
if (file_exists($filePath)) {
    $messages = json_decode(file_get_contents($filePath), true);
} else {
    echo json_encode(['error' => 'No data found']);
    exit;
}

// Flag for whether the message was found
$found = false;

// Update the message
foreach ($messages as &$entry) {
    if (isset($entry['id']) && $entry['id'] == $postId) {
        if ($type == 1) {
            $entry['likes']++;
        } else if ($type == 0) {
            $entry['dislikes']++;
        } else {
            echo json_encode(['error' => 'Invalid type']);
            exit;
        }
        $found = true;
        break;
    }
}

if ($found) {
    // Save updated messages
    file_put_contents($filePath, json_encode($messages, JSON_PRETTY_PRINT));
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Message not found']);
}
?>