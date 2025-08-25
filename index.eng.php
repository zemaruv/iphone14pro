<?php
/* Cookie settings for the session — IMPORTANT: before session_start() */
session_set_cookie_params([
  'lifetime' => 0,
  'path' => '/',
  'secure' => true,    // requires HTTPS
  'httponly' => true,  // protection against XSS
  'samesite' => 'Strict' // protection against CSRF
]);
session_start();

/* Generate CSRF token once per session */
if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
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
                        <a class="menu-link" href="#section1">What's New</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="#section2">Color</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="#section3">Order</a>
                    </li>
                </ul>   
                <a class="nav-logo">
                    <img class="logo-img" src="images/logo.svg" alt="site logo">
                </a>
                <div class="nav-right">
                    <a class="nav-phone" href="tel:+380504565656">+38 050-456-56-56</a>
                    <div class="languages">
                        <a class="languages-item" href="">UKR</a>
                        <div class="nav-slash"></div>
                        <a class="languages-item" href="index.ru.html">RU</a>
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
                <a class="headline-btn fade-in-scroll" href="#" id="openModal">CHOOSE</a>
            </div>
        </section>
        <section class="new fade-in-scroll">
            <div class="container">
                <h2 class="new-title fade-in-scroll" id="section1">WHAT'S NEW</h2>
                <div class="new-info">
                    <div class="new-text fade-in-scroll">
                        <p>
                            All models are equipped with the A16 Bionic chip, a 48-megapixel main camera, and ProMotion displays with Ceramic Shield protection and 1–120 Hz refresh rate, as well as LPDDR5 high-speed memory. The design has been updated, with two cutouts on the front panel.
                        </p>
                        <p>
                            All iPhone 14 models in the US will be sold without a SIM card tray: the manufacturer states that the improved eSIM technology will allow transferring old electronic SIMs to new smartphones.
                        </p>
                        <p>
                            Front camera updated with autofocus and fast recognition in low light, and main camera sensor improved.
                        </p>
                        <b>
                            iPhone 14 Pro received a new design — without the usual notch. A new color has also been added. The smartphone is powered by the A16 Bionic processor, which performs up to 4 trillion photo operations per second.
                        </b>
                    </div>
                    <picture>
                        <source srcset="/images-avif/iphone-news.avif" type="image/avif">
                        <source srcset="/images-
