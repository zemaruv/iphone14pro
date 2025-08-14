<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/plain; charset=utf-8');

// Настройки
$token = "8101136085:AAHNaOp0SWxTJBBo-FpGRDrxuBUKAhf-9R4"; // Твой токен
$chat_id = "593216853"; // Твой chat_id

// Получаем данные с помощью null coalescing operator (PHP 7+)
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$color = trim($_POST['color'] ?? '');

if ($name === '' || $phone === '') {
    echo 'error';
    exit;
}

// Формируем сообщение
$message = "<b>Новая заявка с сайта</b>\n";
$message .= "<b>Имя:</b> {$name}\n";
$message .= "<b>Телефон:</b> {$phone}\n";
if ($color !== '') {
    $message .= "<b>Цвет:</b> {$color}\n";
}

// Отправка через cURL, если доступно
if (function_exists('curl_init')) {
    $ch = curl_init("https://api.telegram.org/bot{$token}/sendMessage");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'chat_id' => $chat_id,
        'parse_mode' => 'HTML',
        'text' => $message
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Отключаем проверку SSL (для теста, не для продакшена)
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($http_code === 200 && $response !== false) {
        echo 'success';
    } else {
        file_put_contents(__DIR__ . '/telegram_error.log', date('Y-m-d H:i:s') . " | HTTP: {$http_code} | Error: {$error} | Response: {$response}\n", FILE_APPEND);
        echo 'error';
    }
} else {
    // Если cURL недоступен — fallback на file_get_contents
    $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=HTML&text=" . urlencode($message);
    $result = file_get_contents($url);
    if ($result !== false) {
        echo 'success';
    } else {
        echo 'error';
    }
}

?>


