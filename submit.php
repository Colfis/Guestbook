<?php
include "jsonfunc.php";

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
      echo 'name cannot contain numbers';
      exit;
    }

    echo "<p>Thank you <strong>$name</strong>! Your message: <em>$message</em> has been received.</p>";
    // Store the message using the function from jsonfunc.php
    storeMessage($name, $message, $likes, $dislikes);
    echo "<p>Your message has been stored successfully. Please Refresh the page to see your message.</p>";
  }
?>