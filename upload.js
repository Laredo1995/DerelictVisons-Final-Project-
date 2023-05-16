const form = document.getElementById('upload-form');
form.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(form);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Display the server's response
        })
        .catch(error => {
            console.error(error);
        });
});
