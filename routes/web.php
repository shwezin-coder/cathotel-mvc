<?php 
use Core\Router;
$app = new Router($dbc);

$app::get('/','HomeController','view');
$app::get('/contact_us','ContactController','index');
$app::post('/','HomeController','test');
$app->run();