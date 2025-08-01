<?php
$token = "8101136085:AAHNaOp0SWxTJBBo-FpGRDrxuBUKAhf-9R4";
$chat_id = "593216853";

// Собираем данные с форм
$name = $_POST['name'] ?? $_POST['user_name'] ?? '';
$phone = $_POST['phone'] ?? $_POST['user_tel'] ?? '';
$color = $_POST['color'] ?? '';

// Формируем текст для Telegram
$arr = [
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Цвет: ' => $color
];

$txt = "";
foreach($arr as $key => $value) {
  if (!empty($value)) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  }
}

// Отправка в Telegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  echo 'success';
} else {
  echo 'error';
}
?>
