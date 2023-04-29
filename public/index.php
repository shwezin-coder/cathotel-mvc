<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<?php 
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL','http://');
define('ROOT_DIRECTORY',URL .$_SERVER['HTTP_HOST'].'/cathotel-mvc/');
require_once '../vendor/autoload.php';
use Core\DatabaseConnection;

DatabaseConnection::connect('localhost','adorable_cat','root','');
$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();
require_once '../routes/web.php';
