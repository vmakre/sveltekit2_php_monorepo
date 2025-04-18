<?php
const ROOT = __DIR__ .'/..';
require_once ROOT . '/vendor/autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(ROOT.'/.env');

require ROOT . '/src/server/routes/index.php';

Flight::route('*', function () {
    include ('index.html');
});

Flight::start();