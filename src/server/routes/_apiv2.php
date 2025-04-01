<?php
use Tqdev\PhpCrudApi\RequestFactory;
use Tqdev\PhpCrudApi\ResponseUtils;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;


Flight::route('/apiv2/*', function (): void {
  global $host ,$user,$db,$pass;
  $config = new Config([
    
    'driver' => 'mysql',
    'address' => $host,
    'port' => '3306',
    'username' => $user,
    'password' => $pass,
    'database' => $db,
    'basePath' => '/apiv2',
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
  


