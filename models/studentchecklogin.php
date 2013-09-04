<?
class checklogin{
	
	public function __construct($firstname, $lastname, $email){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = 'select * from students where firstname = :firstname and lastname = :lastname and email = :email';
		$st = $db->prepare($sql);
		$st->execute(array(":firstname"=>$firstname,":lastname"=>$lastname,":email"=>$email));
		$val = $st->fetchAll();
				
		if($val){
			$_SESSION["loggedin"] = 1;
			header("location: ../teacherV3.1/index.php?controllers=grades&action=student");
			
		}else{
			$_SESSION["loggedin"] = 0;
			header("location: ../teacherV3.1/index.php?controllers=home");
		}
	}
}
$check = new checklogin($_POST["firstname"],$_POST["lastname"],$_POST["email"]);
?>