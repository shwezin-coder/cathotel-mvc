<?php 
use Core\Router;
$app = new Router($dbc);

$app::get('/','HomeController','view');
$app::get('/contact-us','ContactController','index');
$app::post('/contact-us','ContactController','save');
$app::get('/contact-us/delete','ContactController','delete');
$app::post('/','HomeController','test');
$app->run();