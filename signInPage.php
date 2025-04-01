<?php
error_reporting(E_ERROR | E_PARSE);
require_once('Database.php');
session_start();
require_once('UserTable.php');
require_once('UserLogic.php');
require_once('userAction.php');
if (UserLogic::isAutorized()) {
  header("Location: http://localhost/Lr3Site/index.php");
}
$errors = userAction::signIn();
require_once('head.php');
require_once('header.php');
require_once('signInForm.php');
require_once('footer.php');
?>