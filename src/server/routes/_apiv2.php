<?php
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;


Flight::route('/'.$_ENV['PUBLIC_CRUD_API'].'/*', function (): void {
  $config = new Config([
    'driver' => 'mysql',
    'address' => $_ENV['DB_HOST'],
    'port' => '3306',
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD'],
    'database' => $_ENV['DB'],
    'basePath' => '/'.$_ENV['PUBLIC_CRUD_API'],
    'debug' => true,
    'cors.allowedOrigins'=> "*",
    'cacheType' => 'TempFile',
    'cachePath' => '../tmp',
    ]);
    $request = RequestFactory::fromGlobals();
    $api = new Api($config);
    // enable sessions if you want php-crud-api to be authenticaed via session security
    if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }

    $response = $api->handle($request);
    ResponseUtils::output($response);
    //Flight::json( $response);
 });
  


