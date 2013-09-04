<?
class checklogin{
	
	public function __construct($firstname, $lastname, $pass){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = 'select * from teachers where firstname = :firstname and lastname = :lastname and password = MD5(:pass)';
		$st = $db->prepare($sql);
		$st->execute(array(":firstname"=>$firstname,":lastname"=>$lastname,":pass"=>$pass));
		$val = $st->fetchAll();
				
		if($val){
			$_SESSION["loggedin"] = 1;
			header("location: ../teacherV3.1/index.php?controllers=grades");
		}else{
			$_SESSION["loggedin"] = 0;
			header("location: ../teacherV3.1/index.php?controllers=home");
		}
	}
}
$check = new checklogin($_POST["firstname"],$_POST["lastname"],$_POST["pass"]);
?>