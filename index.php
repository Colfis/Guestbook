<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guestbook</title>
    <link rel="stylesheet" href="style.css">
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(htmlspecialchars($_POST['name']));
    $message = trim(htmlspecialchars($_POST['message']));
    
    // Check if the name and message are not empty
    if (empty($name) || empty($message)) {
        echo "<p>Please fill in all fields.</p>";
        exit;
    }

    // Validate the name
    if (preg_match('~[0-9]+~', $name)) {
      echo 'string with numbers';
      exit;
    }

    echo "<p>Thank you <strong>$name</strong>! Your message: <em>$message</em> has been received.</p>";
    
    // Database connection
    $db =  new mysqli("sql303.infinityfree.com", "if0_39233272", "GDLf9vcpiK", "if0_39233272_guestbook");

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    // Prepare and bind
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";

    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    // Close the connection
    $db->close();
?>