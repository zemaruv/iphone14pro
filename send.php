<?php
declare(strict_types=1);
session_start();

/* Ошибки на продакшене не показываем */
ini_set('display_errors', '0');
error_reporting(E_ALL);
header('Content-Type: text/plain; charset=utf-8');

/* Подключаем токен и chat_id */
require_once __DIR__ . '/secure/config.php';

/* Проверяем CSRF */
if ($_SERVER['REQUEST_METHOD'] !== 'POST'
 || !isset($_POST['csrf_token'])
 || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
  http_response_code(400);
  echo 'error';
  exit;
}

/* Экранирование от XSS */
function esc(string $s): string {
  $s = trim($s);
  $s = htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
  return str_replace(['&', '<', '>', '"'], ['&amp;', '&lt;', '&gt;', '&quot;'], $s);
}

$name  = esc($_POST['name']  ?? '');
$phone = esc($_POST['phone'] ?? '');
$color = esc($_POST['color'] ?? '');

if ($name === '' || $phone === '') {
  echo 'error';
  exit;
}

/* Проверка телефона */
if (!preg_match('/^[0-9+\-\s()]{6,20}$/', $phone)) {
  echo 'error';
  exit;
}

/* Сообщение */
$message  = "<b>Новая заявка с сайта</b>\n";
$message .= "<b>Имя:</b> {$name}\n";
$message .= "<b>Телефон:</b> {$phone}\n";
if ($color !== '') {
  $message .= "<b>Цвет:</b> {$color}\n";
}

/* Отправка в Telegram */
$endpoint = "https://api.telegram.org/bot" . TG_BOT_TOKEN . "/sendMessage";
$ch = curl_init($endpoint);
curl_setopt_array($ch, [
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => [
    'chat_id'    => TG_CHAT_ID,
    'parse_mode' => 'HTML',
    'text'       => $message
  ],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYPEER => true,
  CURLOPT_SSL_VERIFYHOST => 2,
  CURLOPT_TIMEOUT => 8
]);

$response  = curl_exec($ch);
$http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error     = curl_error($ch);
curl_close($ch);

if ($http_code === 200 && $response !== false) {
  echo 'success';
} else {
  file_put_contents(__DIR__ . '/telegram_error.log',
    sprintf("%s | HTTP:%d | Error:%s | Resp:%s\n", date('c'), $http_code, $error, (string)$response),
    FILE_APPEND
  );
  echo 'error';
}
