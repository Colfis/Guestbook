const submit = document.getElementById('submit-button');
const response = document.getElementById('response-message');

submit.addEventListener("click", (event) => {
    const nameInput = document.getElementById('name').value;
    const messageInput = document.getElementById('message');
    const matches = nameInput.match(/\d+/g);
    if (matches != null) {
        event.preventDefault();
        response.innerHTML = "Your name cannot contain numbers.";
    }
});