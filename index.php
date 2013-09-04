<?
require_once "models/getView.php";

$controller = new getView();


if(!empty($_GET["controllers"])){
	if($_GET["controllers"]== ""){
		
	}elseif($_GET['controllers'] =='home'){

		$controller->getFile('controllers/home.php');
	
	}elseif($_GET['controllers'] =='grades'){

		$controller->getFile('controllers/grades.php');
	
	}elseif($_GET['controllers'] =='students'){

		$controller->getFile('controllers/students.php');
	
	}elseif($_GET['controllers'] =='teachers'){

		$controller->getFile('controllers/teachers.php');
	
	}elseif($_GET['controllers'] =='mail'){

		$controller->getFile('controllers/mail.php');
	
	}elseif($_GET['controllers'] =='register'){

		$controller->getFile('controllers/register.php');
	
	}elseif($_GET['controllers'] =='login'){

		$controller->getFile('controllers/login.php');
	}
	
}else{
	$controller->getFile('controllers/home.php');
}
?>