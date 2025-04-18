<?php
use flight\database\PdoWrapper;
Flight::register('db', PdoWrapper::class, [ 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB'].';charset=utf8mb4', $_ENV['DB_USER'], $_ENV['DB_PASS'] ]);




// Flight::route('/api/versions', function (): void {
//   // Don't do this in your houses, only for testing purposes 🚫
//   $composerJson = json_decode(file_get_contents(ROOT . '/composer.json'), true);
//   $packageJson = json_decode(file_get_contents(ROOT . '/package.json'), true);

//   echo json_encode([
//     $composerJson['require']['flightphp/core'],
//     $packageJson['devDependencies']['svelte']
//   ]);
// });

Flight::route('/api/auth', function (): void {
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

  $userId = $_SESSION['auth.user.id'] ?? null;
  $userEmail = $_SESSION['auth.user.email'] ?? null;

  Flight::json([
    'isLogged' => $userId !== null,
    'email' => $userEmail
  ]);
});

Flight::route('/api/users', function (): void {
//   $user = $_GET['user'] ?? null;
  if (session_status() !== PHP_SESSION_ACTIVE) {
      session_start();
    }
  $user = $_SESSION['auth.userid'] ?? null;
  if ($user['id'] == null){
       return ;
    }

  $db = Flight::db();
  $sql = "SELECT * FROM users WHERE id=? LIMIT 1 ";
  $pdo_statement = $db->runQuery($sql,[$user['id']]);
  while ($result = $pdo_statement->fetch()){
    $result1[] = $result;
  };
  Flight::json([
    'records' => $result1 ?? [] 
  ]);
});
