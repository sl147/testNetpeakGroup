<?php
//Front controller

define('ROOT', dirname(__FILE__).'\src/');
define('SITEINDEX', ROOT.'views/layouts/siteIndex.php');
define('FILESETTINGS', 'settings.txt');
define('FILEHISTORY', 'history.txt');
define('CONSTQUANTITY', 100);

require_once (ROOT."/components/Autoload.php");
require_once (ROOT."/components/Router.php");

$router = new Router();
$router->run();