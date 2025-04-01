<?php

// If you're using Composer, require the autoloader.
require '../vendor/autoload.php';
// if you're not using Composer, load the framework directly
// require 'flight/Flight.php';

// Then define a route and assign a function to handle the request.
Flight::route('/', function () {
   echo 'hello world!';
//   $file = 'index.html';
// if (file_exists($file)) {
//    include($file);
// }
});

// Finally, start the framework.
Flight::start();

// echo "";
// $file = 'index.html';
// if (file_exists($file)) {
//    include($file);
// } else {
//     throw new Error("greska");
// }

// require ("./index2.php");