<?
	session_start();
	require_once "models/getView.php";
	require_once "models/mail.php";
	require_once "models/students.php";
	$views = new getView();
	$mailModel = new spamcheck();
	$studentModel = new students();
	$views->getFile("views/header.php");
	
	if(!empty($_GET['action'])){
		if($_GET["action"] == "send"){
			
			if(isset($_POST['email'])){//if "email" is filled out, proceed
			
			  //check if the email address is invalid
				$mailcheck = $mailModel->spamcheck($_POST['email']);
				if($mailcheck==FALSE){
					$views->getFile("views/error.php");
					$views->getFile("views/mail.php");
				}else{//send email
					$email = $_POST['email'] ;
					$subject = $_POST['subject'] ;
					$message = $_POST['message'] ;
					mail($email, $subject, $message);
					//$views->getFile("views/mail.php", $email);
					$data = $studentModel->getAll($_SESSION["teacherID"]);
					$views->getFile("views/grades.php", $data);
				}
			 }else{//if "email" is not filled out, display the form
			 $views->getFile("views/mail.php");
			 }
			//		
		}else if($_GET["action"] == "mail"){
			$data = $_GET["email"];
			$views->getFile("views/mail.php", $data);
		}else if($_GET["action"] == ""){
			$views->getFile("views/mail.php");
		}
		
	}else{
		$views->getFile("views/mail.php");
	}
	$views->getFile("views/footer.php");
?>
