document.getElementById('anonymousForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const message = document.getElementById('message').value;

    // Отправка данных формы на сервер
    fetch('send_message.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            message: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Сообщение отправлено!');
            document.getElementById('anonymousForm').reset();
        } else {
            alert('Ошибка отправки сообщения.');
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Ошибка отправки сообщения.');
    });
});