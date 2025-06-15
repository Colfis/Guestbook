<?php
function storeMessage($name, $message) {
    // Define the file path
    $filePath = 'guestbook.json';

    // Read existing messages
    if (file_exists($filePath)) {
        $data = json_decode(file_get_contents($filePath), true);
    } else {
        $data = [];
    }

    // Add the new message
    $data[] = [
        'name' => $name,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Write the updated data back to the file
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}
?>