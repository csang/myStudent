<?
	session_start();
	require_once "models/getView.php";	
	require_once "models/students.php";
	require_once "models/teachers.php";
	$views = new getView();
	$studentModel = new students();
	$teacherModel = new teachers();
	
	$views->getFile("views/header.php");

	if(!empty($_GET['action'])){
		
		$action = $_GET['action'];
		
		if($action == "update"){
			$data = $studentModel->update($_POST['lab1'], $_POST['lab2'], $_POST['lab3'], $_POST['lab4'], $_POST['lab5'],
			$_POST['lab6'], $_POST['lab7'], $_POST['lab8'], $_POST['lab9'], $_POST['lab10'], $_POST['quiz1'], $_POST['quiz2'], $_POST['quiz3'], $_POST['quiz4'], $_POST['midterm'], $_POST['final'], $_POST['studentID'], $_SESSION["teacherID"]);
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/grading.php", $data);
			
		}else if($action == "grades"){
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/grades.php", $data);
		
		}else if($action == "grading"){
			$data = $studentModel->getAll($_SESSION["teacherID"]);
			$views->getFile("views/grading.php", $data);
		}else if($action == "student"){
			$data = $teacherModel->getAll($_SESSION["studentID"]);
			//var_dump($data);
			$views->getFile("views/student.php", $data);
			
		}
		
	}else{
		$data = $studentModel->getAll($_SESSION["teacherID"]);
		$views->getFile("views/grades.php", $data);
	}

	$views->getFile("views/footer.php");
?>