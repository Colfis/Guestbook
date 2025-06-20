<?php
function storeMessage($name, $message, $likes, $dislikes) {
    // Define the file path
    $filePath = 'guestbook.json';

    // Read existing messages
    if (file_exists($filePath)) {
        $data = json_decode(file_get_contents($filePath), true);
    } else {
        $data = [];
    }
    
    // Getting Last ID and adding +1 To it to have unique ids
    $nextId = !empty($data) ? end($data)['id'] + 1 : 1;

    // Add the new message
    $data[] = [
        'id' => $nextId,
        'name' => $name,
        'message' => $message,
        'timestamp' => date('Y-m-d H:i:s'),
        'likes' => $likes,
        'dislikes' => $dislikes
    ];

    // Write the updated data back to the file
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}
?>