<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guestbook</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:FILL@1" rel="stylesheet" />
  </head>
  <body>
    <h1>Colins Guestbook</h1>
    <div id="guestbook-form">
      <form action="" method="post">
        <input type="text" name="name" id="name" placeholder="Your Name" required>
        <input type="text" name="message" id="message" placeholder="Your Message" required>
        <button id="submit-button" type="submit">Sign Guestbook</button>
        <p id="response-message"></p>
      </form>
    </div>
    <script src="guestbook.js"></script>
  </body>
</html>

<?php
include "jsonfunc.php";
$contents = file_get_contents('guestbook.json');
// Check if the file exists and is readable
if ($contents === false) {
    echo "<p>Error reading guestbook data.</p>";
    exit;
}
// Decode the JSON data
$data = json_decode($contents, true);
// Check if the JSON data is valid
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "<p>Error decoding guestbook data: " . json_last_error_msg() . "</p>";
    exit;
}

// Display existing messages and Likes/Dislikes and the Buttons
if (!empty($data)) {
    echo "<h2>Messages:</h2>";
    foreach ($data as $entry) {
        echo "<p>
                <strong>" . htmlspecialchars($entry['name']) . "</strong>: " . htmlspecialchars($entry['message']) . " <em>(" . htmlspecialchars($entry['timestamp']) . ")</em>
                <span class='post-rating '>
                  <span class='post-rating-button like-pos material-symbols-outlined'>thumb_up</span>
                  <span class='post-rating-counter counter-like'>0</span>
                </span>
                <span class='post-rating '>
                  <span class='post-rating-button dislike-pos material-symbols-outlined'>thumb_down</span>
                  <span class='post-rating-counter counter-dislike'>0</span>
                </span>
              </p>";
    }
} else {
    echo "<p>No messages found.</p>";
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(htmlspecialchars($_POST['name']));
    $message = trim(htmlspecialchars($_POST['message']));
    $likes = 0;
    $dislikes = 0;
    
    // Check if the name and message are not empty
    if (empty($name) || empty($message)) {
        echo "<p>Please fill in all fields.</p>";
        exit;
    }
    // Validate the name length
    if (strlen($name) < 3 || strlen($name) > 20) {
        echo "<p>Name must be between 3 and 20 characters long.</p>";
        exit;
    }

    // Validate the name
    if (preg_match('~[0-9]+~', $name)) {
      echo 'your name cannot contain numbers';
      exit;
    }

    echo "<p>Thank you <strong>$name</strong>! Your message: <em>$message</em> has been received.</p>";
    // Store the message using the function from jsonfunc.php
    storeMessage($name, $message, $likes, $dislikes);
    echo "<p>Your message has been stored successfully. Please Reopen the page to see your message.</p>";
  }
?>
