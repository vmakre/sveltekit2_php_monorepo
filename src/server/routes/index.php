<?php
use flight\database\PdoWrapper;

// db connect mysql
$host='10.45.2.8';
$user='zabbix';
$pass='zabbix';
$db='sakila';
Flight::register('db', PdoWrapper::class, [ 'mysql:host='.$host.';dbname='.$db.';charset=utf8mb4', $user, $pass ]);


foreach (glob(__DIR__ . '/_*.php') as $fileName) {
  require $fileName;
}
