<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Meiji\LinkShortener\Controllers\RedirectController;
use eftec\bladeone\BladeOne;

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';
$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$controller = new RedirectController($blade);
$controller->handleRedirect($path);
