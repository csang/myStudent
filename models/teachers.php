<?
class teachers{
	
	/*public function __construct(){}*/
	
	public function getAll($studentID = 0){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select concat(t.firstname, ' ',t.lastname) as teacher, 
g.lab1, g.lab2, g.lab3, g.lab4, g.lab5, g.lab6, g.lab7, g.lab8, g.lab9, g.lab10, g.quiz1, g.quiz2, g.quiz3, g.quiz4, g.midterm, g.final, 
(g.lab1 + g.lab2 + g.lab3 + g.lab4 + g.lab5 + g.lab6 + g.lab7 + g.lab8 + g.lab9 + g.lab10 + g.quiz1 + g.quiz2 + g.quiz3 + g.quiz4 + g.midterm + g.final)/16 as finalGrade from grades g
	join teachers t on t.teacherID = g.teacherID
where g.studentID = :studentID";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":studentID"=>$studentID));
		return $statement->fetchAll();
	}
	
	public function update($email = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "update students 
				set email=:email
				where studentID=:studentID and teacherID=:teacherID;";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":lab1"=>$lab1, ":lab2"=>$lab2, ":lab3"=>$lab3, ":lab4"=>$lab4, ":lab5"=>$lab5, 
		":lab6"=>$lab6, ":lab7"=>$lab7, ":lab8"=>$lab8, ":lab9"=>$lab9, ":lab10"=>$lab10, 
		":quiz1"=>$quiz1, ":quiz2"=>$quiz2, ":quiz3"=>$quiz3, ":quiz4"=>$quiz4, 
		":studentID"=>$studentID, ":teacherID"=>$teacherID));
	}
	
	public function search($search = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select firstname, lastname
				from teachers
				where firstname like '%".$search."%' or lastname like '%".$search."%";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":search"=>$search));
		return $statement->fetchAll();
	}
	
	public function checkLogin($firstname = "", $lastname = "", $password = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select * from teachers where firstname = :firstname and lastname = :lastname and password = :password";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":password"=>$password));
		return $statement->fetchAll();
	}
	
	public function add($firstname = "", $lastname = "", $pass = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "insert into teachers(firstname, lastname, password)
				values(:firstname, :lastname, MD5(:pass))";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":pass"=>$pass));
	}
	
	public function getTeacher($firstname = "", $lastname = "", $pass = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select teacherID from teachers where firstname = :firstname and lastname = :lastname and password = MD5(:pass)"; 
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":pass"=>$pass));
		return $statement->fetchAll();
	}
}
?>