<?
	session_start();
	include "models/protector.php";
	require_once "models/getView.php";	
	require_once "models/teachers.php";
	$views = new getView();
	$teacherModel = new teachers();
	
	$views->getFile("views/header.php");

	if(!empty($_GET['action'])){
		
		$action = $_GET['action'];
			
		if($action == "logout"){
			$_SESSION["loggedin"] = 0;
			session_destroy();
			$views->getFile("views/loginform.php");
		}
		
	}else{
		$views->getFile("views/home.php");
	}

	$views->getFile("views/footer.php");
?>