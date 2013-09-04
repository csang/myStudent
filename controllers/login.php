<?
	session_start();
	require_once "models/getView.php";	
	require_once "models/students.php";
	require_once "models/teachers.php";
	$views = new getView();
	$studentModel = new students();
	$teacherModel = new teachers();
	
	if(!empty($_GET['action'])){
		$action = $_GET['action'];
		if($action =="login"){
			if($_POST['firstname'] == '' && $_POST['lastname'] = '' && $_POST['pass'] == ''){
				
				header("location: ../teacherV3.0/index.php?controllers=home");
				$views->getFile("views/footer.php");
			
			}else{
				$teacher = $teacherModel->getTeacher($_POST['firstname'], $_POST['lastname'], $_POST['pass']);
				foreach($teacher as $t){
					$_SESSION["teacherID"] = $t['teacherID'];
				}
			}
			include "models/checklogin.php";
		}else if($action =="studentLogin"){
			if($_POST['firstname'] == '' && $_POST['lastname'] = '' && $_POST['email'] == ''){
				$views->getFile("views/header.php");
				$views->getFile("views/footer.php");
			
			}else{
				$student = $studentModel->getStudent($_POST['firstname'], $_POST['lastname'], $_POST['email']);
				foreach($student as $s){
					$_SESSION["studentID"] = $s['studentID'];
				}
				include "models/studentchecklogin.php";
			}
		}else if($action =="register"){
			if($_POST["captcha"] == $_SESSION["captcha"]){
			$data = $teacherModel->add($_POST['firstname'], $_POST['lastname'], $_POST['pass']);
			$teacher = $teacherModel->getTeacher($_POST['firstname'], $_POST['lastname'], $_POST['pass']);
			$_SESSION["loggedin"] = 1;
			foreach($teacher as $t){
				$_SESSION["teacherID"] = $t['teacherID'];
			}
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/header.php");
			$views->getFile("views/grading.php", $data);
			$views->getFile("views/footer.php");
		
		}else{
				header("location: ../teacherV3.0/index.php?controllers=home");
				$views->getFile("views/footer.php");
			}
		}
	}
?>