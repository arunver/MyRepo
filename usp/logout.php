<?
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->Logout();
redirect('index.php'); //It will redirect on home page when user access page without login

?>
