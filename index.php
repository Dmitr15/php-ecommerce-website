<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
require_once("core.php");
if ($_GET["clearFilter"] !='') {
    header("Location: http://localhost/Lr3Site/index.php");
}
require_once('head.php');
require_once('headerInfo.php');
require_once('header.php');
require_once('mainLabel.php');

if (UserLogic::isAutorized()) {
    require_once('form.php');
}
else {
    require_once('boxes.php');
}
require_once('footer.php');
