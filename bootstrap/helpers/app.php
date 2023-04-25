<?php 
use Core\Router;
$app = new Router();
function view($view, $params = [])
{
    global $app;
    return $app->render($view,$params);
}