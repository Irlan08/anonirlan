<?php
header('Content-Type: application/json');

// Получение данных из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['message'])) {
    $message = $data['message'];

    // Здесь вы можете настроить отправку сообщения на ваш email
    $to = 'irlanjoldoshov@gmail.com';
    $subject = 'Новое анонимное сообщение';
    $headers = 'From: no-reply@example.com' . "\r\n" .
               'Reply-To: no-reply@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>