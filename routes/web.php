<?php 
use Core\Router;
$app = new Router($dbc);

$app::get('/','HomeController','view');
$app::get('/contact-us','ContactController','index');
$app::post('/contact-us','ContactController','save');
$app::get('/contact-us/delete','ContactController','delete');
$app::get('/login','LoginController','view');
$app::post('/login','LoginController','authentication');
$app::get('/admin','IndexController','index');
$app::get('/user-profile','UserProfileController','index');
$app::post('/user-profile','UserProfileController','update');
$app->run();