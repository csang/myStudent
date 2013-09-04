<?
	session_start();
	$_SESSION["loggedin"] = 0;
	require_once "models/getView.php";	
	require_once "models/students.php";
	$views = new getView();
	$studentModel = new students();
	$views->getFile("views/header.php");
	$views->getFile("views/home.php");
	$views->getFile("views/footer.php");
	
	include "models/captchaModel.php";
	$captcha = new captcha();
	$randCap = $captcha->random(5);
	$captcha->msg($randCap);
	$_SESSION["captcha"] = $randCap;
	
?>