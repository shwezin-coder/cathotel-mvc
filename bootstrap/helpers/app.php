<?php 
use Core\Router;
use Core\DatabaseConnection;
DatabaseConnection::connect('localhost','adorable_cat','root','');
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();
$app = new Router($dbc);
function view($view, $params = [])
{
    global $app;
    return $app->render($view,$params);
}
