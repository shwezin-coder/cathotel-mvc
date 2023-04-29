<?php

session_start();
use Core\Router;
use Core\DatabaseConnection;
use Core\SweetAlert;

DatabaseConnection::connect('localhost','adorable_cat','root','');
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();
$app = new Router($dbc);
function view($view, $params = [])
{
    global $app;
    return $app->render($view,$params);
}
function redirect($url)
{
    $redirect_url = ROOT_DIRECTORY.$url;
    echo "<script>
            window.location.assign('$redirect_url')
        </script>";
}