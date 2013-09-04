<?
	session_start();
	include "models/protector.php";
	require_once "models/getView.php";	
	require_once "models/students.php";
	$views = new getView();
	$studentModel = new students();
	
	$views->getFile("views/header.php");
	
	if(!empty($_GET['action'])){
		
		$action = $_GET['action'];
		
		if($action == "add"){
			if($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['email'] == ''){
				$data = $studentModel->getAll($_SESSION["teacherID"]);
				$views->getFile("views/grading.php", $data);
			}else{
				$addStudent = $studentModel->addStudent($_POST['firstname'], $_POST['lastname'], $_POST['email']);
				$addRelation = $studentModel->addRelation($_SESSION["teacherID"]);
				$addGrades = $studentModel->addGrades($_SESSION["teacherID"]);
				$data = $studentModel->getAll($_SESSION["teacherID"]);
				$views->getFile("views/grading.php", $data);
			}
		}else if($action == "delete"){
			$delete = $studentModel->delete($_GET["gradeID"]);
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/grading.php", $data);
			
		}else if($action == "view"){
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/grades.php", $data);
			
		}else if($action == "logout"){
			$_SESSION["loggedin"] = 0;
			session_destroy();
			$views->getFile("views/loginform.php");
		}
		
	}else{
		$data = $studentModel->getAll($_SESSION["teacherID"]);
		$views->getFile("views/grades.php", $data);
	}
	
	$views->getFile("views/footer.php");
?>