<?php
/* Настройки cookie для сессии — ВАЖНО: до session_start() */
session_set_cookie_params([
  'lifetime' => 0,
  'path' => '/',
  'secure' => true,    // требует HTTPS
  'httponly' => true,  // защита от XSS
  'samesite' => 'Strict' // защита от CSRF
]);
session_start();

/* Генерируем CSRF токен один раз на сессию */
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Iphone 14 PRO</title>
</head>

<body>
    <header class="header fade-in">
        <div class="container">
            <nav class="nav fade-in">
                <button class="menu-btn" type="button">
                    <span class="btn-line"></span>
                    <span class="btn-line"></span>
                    <span class="btn-line"></span>
                    <span class="btn-line"></span>
                </button>
                <ul class="menu">
                    <li class="menu-item">
                        <a class="menu-link" href="#section1">Что нового</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="#section2">Цвет</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="#section3">Заказать</a>
                    </li>
                </ul>   
                <a class="nav-logo">
                    <img class="logo-img" src="images/logo.svg" alt="логотип сайта">
                </a>
                <div class="nav-right">
                    <a class="nav-phone" href="tel:+380504565656">+38 050-456-56-56</a>
                    <div class="languages">
                        <a class="languages-item" href="">Укр</a>
                        <div class="nav-slash"></div>
                        <a class="languages-item" href="index.ru.html">Рус</a>
                        <div class="nav-slash"></div>
                        <a class="languages-item" href="index.eng.html">EN</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <section class="headline fade-in">
            <div class="container">
                <h1 class="title fade-in-scroll">IPHONE 14 PRO</h1>
                <picture>
                    <source srcset="/images-avif/iphone.avif" type="image/avif">
                    <source srcset="/images-webp/iphone.webp" type="image/webp">
                    <img class="headline-img fade-in-scroll" src="images/iphone.png" alt="IPHONE 14 PRO">
                </picture>
                <a class="headline-btn fade-in-scroll" href="#" id="openModal">ВЫБРАТЬ</a>
            </div>
        </section>
        <section class="new fade-in-scroll">
            <div class="container">
                <h2 class="new-title fade-in-scroll" id="section1"> ЧТО НОВОГО</h2>
                <div class="new-info">
                    <div class="new-text fade-in-scroll">
                        <p>
                            Все модели оснащены однокристальной системой A16 Bionic, 48-мегапиксельной основной камерой и экранами ProMotion с защитой Ceramic Shield и частотой 1–120 Гц, а также ускоренной памятью LPDDR5. Дизайн обновлен, на передней панели два выреза.
                        </p>
                        <p>
                            Все iPhone 14 в США будут продаваться без лотка для SIM-карт: производитель заявляет, что улучшенная технология eSIM позволит переносить старые электронные SIM-карты на новые смартфоны.
                        </p>
                        <p>
                            Обновлена фронтальная камера (с автофокусом и быстрым распознаванием при плохом освещении) и сенсор основной камеры.
                        </p>
                        <b>
                            iPhone 14 Pro получил новый дизайн — без привычной «чёлки». Также добавлен новый цвет. Смартфон оснащён процессором A16 Bionic, который выполняет до 4 триллионов операций с фото за секунду.
                        </b>
                    </div>
                    <picture>
                        <source srcset="/images-avif/iphone-news.avif" type="image/avif">
                        <source srcset="/images-webp/iphone-news.webp" type="image/webp">
                        <img class="images-new fade-in-scroll" src="images/iphone-news.jpg" alt="iphone">
                    </picture>
                </div>
            </div>
        </section>
        <section class="color fade-in-scroll">
            <div class="container">
                <h2 class="color-title" id="section2">ВЫБЕРИ СВОЙ ЦВЕТ</h2>
                <ul class="color-list">
                    <li class="color-item">
                        <picture>
                            <source srcset="/images-avif/color-1.avif" type="image/avif">
                            <source srcset="/images-webp/color-1.webp" type="image/webp">
                            <img class="contacts-img" src="images/color-1.jpg" alt="iphone">
                        </picture>
                        <h3 class="color-text-en fade-in-scroll">Silver</h3>
                        <p class="color-text fade-in-scroll">Серебристый</p>
                    </li>
                    <li class="color-item">
                        <picture>
                            <source srcset="/images-avif/color-2.avif" type="image/avif">
                            <source srcset="/images-webp/color-2.webp" type="image/webp">
                            <img class="contacts-img" src="images/color-2.jpg" alt="iphone">
                        </picture>
                        <h3 class="color-text-en fade-in-scroll">Deep Purple</h3>
                        <p class="color-text fade-in-scroll">Тёмно-фиолетовый</p>
                    </li>
                    <li class="color-item">
                        <picture>
                            <source srcset="/images-avif/color-3.avif" type="image/avif">
                            <source srcset="/images-webp/color-3.webp" type="image/webp">
                            <img class="contacts-img" src="images/color-3.jpg" alt="iphone">
                        </picture>
                        <h3 class="color-text-en fade-in-scroll">Gold</h3>
                        <p class="color-text fade-in-scroll">Золотой</p>
                    </li>
                    <li class="color-item">
                        <picture>
                            <source srcset="/images-avif/color-4.avif" type="image/avif">
                            <source srcset="/images-webp/color-4.webp" type="image/webp">
                            <img class="contacts-img" src="images/color-4.jpg" alt="iphone">
                        </picture>
                        <h3 class="color-text-en fade-in-scroll">Space Black</h3>
                        <p class="color-text fade-in-scroll">Космический чёрный</p>
                    </li>
                </ul>
            </div>
        </section>
        <section class="contacts fade-in-scroll">
            <div class="container">
                <div class="contacts-inner">
                    <div class="contacts-content">
                        <form class="contacts-form" id="modal-form" action="send.php" method="post" data-form="tg">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <h2 class="contacts-title fade-in-scroll" id="section3">ХОЧЕШЬ IPHONE 14 PRO?</h2>
                            <input type="text" name="name" class="contacts-input fade-in-scroll" placeholder="Ваше имя" required>
                            <input type="tel" name="phone" class="contacts-input fade-in-scroll" placeholder="Номер телефона" required>
                            <select class="input-color" name="color" required>
                                <option value="" disabled selected>Выбрать цвет</option>
                                <option value="silver">Серебристый</option>
                                <option value="dark">Тёмно-фиолетовый</option>
                                <option value="gold">Золотой</option>
                                <option value="black">Космический чёрный</option>
                            </select>
                            <p class="contacts-text fade-in-scroll">Наш менеджер свяжется с вами в ближайшее время.</p>
                            <button class="contacts-btn fade-in-scroll" type="submit">ЗАКАЗАТЬ</button>
                        </form>
                    </div>
                    <picture>
                        <source srcset="/images-avif/contact.avif" type="image/avif">
                        <source srcset="/images-webp/contact.webp" type="image/webp">
                        <img class="contacts-img" src="images/contact.jpg" alt="iphone">
                    </picture>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer fade-in-scroll"> 
        <div class="container">
            <div class="footer-inner">
                <a class="footer-phone" href="tel:+380504565656">+38 050-456-56-56</a>
                <a class="footer-logo">
                    <img class="logo-img" src="images/logo.svg" alt="логотип сайта">
                </a>
                <a class="footer-link" href="politics-of-confident.html" target="_blank">Политика конфиденциальности</a>
            </div>
        </div>
    </footer>
    <div class="mobile-menu" id="mobileMenu">
        <div class="close-btn">&times;</div>
        <ul class="mobile-menu-list">
            <li class="mobile-menu-item"><a class="mobile-menu-link" href="#section1">Что нового</a></li>
            <li class="mobile-menu-item"><a class="mobile-menu-link" href="#section2">Цвет</a></li>
            <li class="mobile-menu-item"><a class="mobile-menu-link" href="#section3">Заказать</a></li>
        </ul>
    </div>
    <div class="container">
            <div class="modal" id="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal">&times;</span>
                    <form class="contacts-form" id="form" action="send.php" method="post" data-form="tg">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <h2 class="contacts-title fade-in-scroll" id="section3">ХОЧЕШЬ IPHONE 14 PRO?</h2>
                            <input type="text" name="name" class="contacts-input fade-in-scroll" placeholder="Ваше имя" required>
                            <input type="tel" name="phone" class="contacts-input fade-in-scroll" placeholder="Номер телефона" required>
                            <select class="input-color" name="color" required>
                                <option value="" disabled selected>Выберите желаемый цвет</option>
                                <option value="silver">Серебристый</option>
                                <option value="dark">Тёмно-фиолетовый</option>
                                <option value="gold">Золотой</option>
                                <option value="black">Космический чёрный</option>
                            </select>
                            <p class="contacts-text fade-in-scroll">Наш менеджер свяжется с вами в ближайшее время.</p>
                            <button class="contacts-btn fade-in-scroll" type="submit">ЗАКАЗАТЬ</button>
                    </form>
                </div>
            </div>
        </div>
    <div id="success-popup" class="success-popup">
        <div class="success-popup-content">
            <p>Заявка успешно отправлена!</p>
        </div>
    </div>
     <script src="/js/main.js"></script>
</body>
</html>
