# Guestbook
A simple web-based guestbook application built with PHP, JavaScript, and JSON for persistent storage.

## Features

- Visitors can sign the guestbook by submitting their name and a message.
- All messages are stored in a JSON file (`guestbook.json`).
- Displays all previous messages with timestamps.
- Validates input to ensure names do not contain numbers and are between 3 and 20 characters.
- Simple, interface styled with CSS.

## Files

- `guestbook.php` — Main application file; displays the form, handles submissions, and shows messages.
- `jsonfunc.php` — Contains the function to store messages in the JSON file.
- `guestbook.json` — Stores all guestbook entries.
- `guestbook.js` — Client-side validation for the name field.
- `style.css` — Basic styling for the guestbook.
- `.gitattributes`, `LICENSE`, `README.md` — Project metadata.

## Usage

1. Clone or download this repository.
2. Make sure your server supports PHP and has write permissions for `guestbook.json`.
3. Open `guestbook.php` in your browser.
4. Fill in your name and message, then submit to sign the guestbook.
5. Make a pull request so i can add ur lovely signature to the guestbook 

## Requirements

- PHP 5.4 or higher
- A web server (e.g., Apache, Nginx) or just open it in ur local browser and sign it

## License

This project is licensed under the MIT License. See [LICENSE](LICENSE)