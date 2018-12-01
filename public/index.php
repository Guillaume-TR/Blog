<?php
session_start();

require '../config/Autoloader.php';

App\config\Autoloader::register();

$routing = new App\config\Router();
$routing->run();

