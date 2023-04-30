<?php 
use Core\Router;
$app = new Router($dbc);

$app::get('/','HomeController','view');
$app::get('/contact-us','ContactController','index');
$app::post('/contact-us','ContactController','save');
$app::get('/contact-us/delete','ContactController','delete');
$app::get('/login','AuthController','index');
$app::get('/logout','AuthController','logout');
$app::post('/login','AuthController','authentication');
$app::get('/admin','IndexController','index');
$app::get('/user-profile','UserProfileController','index');
$app::post('/user-profile','UserProfileController','update');
$app::get('/change-password','ChangePasswordController','index');
$app::get('/signup','SignUpController','index');
$app::post('/signup','SignUpController','save');
$app::get('/users','UserController','index');
$app->run();