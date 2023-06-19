<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start(); 




require 'vendor/autoload.php';  

require 'app/config/config.php';

require 'app/config/global.php';

if (PATH_LOCALHOST =='http://localhost/mariaflightphp/') {
	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);
}  

use Illuminate\Database\Capsule\Manager as Capsule;  

$capsule = new Capsule; 


/////// Connection Database ////////
 
$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'eventos',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => ''
));

//////// Allows you to connect to different databases
$capsule->bootEloquent();
$capsule->setAsGlobal(); 

//////// main controllers
new controllers\Routes(); 

Flight::start(); 