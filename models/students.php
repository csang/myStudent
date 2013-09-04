<?
class students{
	
	/*public function __construct(){}*/
	
	public function getAll($teacherID){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select *, concat(s.firstname,' ', s.lastname) as student,  
(g.lab1 + g.lab2 + g.lab3 + g.lab4 + g.lab5 + g.lab6 + g.lab7 + g.lab8 + g.lab9 + g.lab10 + g.quiz1 + g.quiz2 + g.quiz3 + g.quiz4 + g.midterm + g.final)/16 as finalGrade from grades g
	left join students s on s.studentID = g.studentID
	where teacherID = :teacherID";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":teacherID"=>$teacherID));
		return $statement->fetchAll();
	}
	
	public function update($lab1 = 0, $lab2 = 0, $lab3 = 0, $lab4 = 0, $lab5 = 0, 
							$lab6 = 0, $lab7 = 0, $lab8 = 0, $lab9 = 0, $lab10 = 0,
							$quiz1 = 0, $quiz2 = 0, $quiz3 = 0, $quiz4 = 0, $midterm = 0, $final = 0,
	 						$studentID = 0, $teacherID = 0){
		
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "update grades 
				set lab1 = $lab1, lab2 = $lab2, lab3 = $lab3, lab4 = $lab4, lab5 = $lab5,
		 		lab6 = $lab6, lab7 = $lab7, lab8 = $lab8, lab9 = $lab9, lab10 = $lab10,
				quiz1 = $quiz1, quiz2 = $quiz2, quiz3 = $quiz3, quiz4 = $quiz4, midterm = $midterm, final = $final
				where studentID = $studentID and teacherID = $teacherID";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":lab1"=>$lab1, ":lab2"=>$lab2, ":lab3"=>$lab3, ":lab4"=>$lab4, ":lab5"=>$lab5, 
		":lab6"=>$lab6, ":lab7"=>$lab7, ":lab8"=>$lab8, ":lab9"=>$lab9, ":lab10"=>$lab10, 
		":quiz1"=>$quiz1, ":quiz2"=>$quiz2, ":quiz3"=>$quiz3, ":quiz4"=>$quiz4, 
		":studentID"=>$studentID, ":teacherID"=>$teacherID));
		return $statement->fetchAll();
	}	
	
	public function delete($gradeID){
		
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "delete from grades
                    where id = :gradeID";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":gradeID"=>$gradeID));
	}	
	
	public function addStudent($firstname = "", $lastname = "", $email = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "insert into students(firstname, lastname, email)
				values(:firstname, :lastname, :email)";
				
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":email"=>$email));
	}
	
	public function addRelation($teacherID){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "insert into studentTeachers(teacherID, studentID)
				values(:teacherID,(select studentID from students order by studentID desc limit 1))";
				
		$statement = $db->prepare($sql);
		$statement->execute(array(":teacherID"=>$teacherID));
	}
	
	public function addGrades($teacherID){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "insert into grades(teacherID, studentID, lab1, lab2, lab3, lab4, lab5, lab6, lab7, lab8, lab9, lab10, quiz1, quiz2, quiz3,
				quiz4, midterm, final)values(:teacherID,(select studentID from students order by studentID desc limit
				1),0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)";
				
		$statement = $db->prepare($sql);
		$statement->execute(array(":teacherID"=>$teacherID));
	}
	
	public function search($search = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select * 
				from students
				where firstname like '%".$search."%' or lastname like '%".$search."%";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":search"=>$search));
		return $statement->fetchAll();
	}
	
	public function checkLogin($firstname = "", $lastname = "", $email = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select * from teachers where firstname = :firstname and lastname = :lastname and email = :email";
		
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":email"=>$email));
		return $statement->fetchAll();
	}
	
	public function getStudent($firstname = "", $lastname = "", $email = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=mystudents","root","root");
		$sql = "select studentID from students where firstname = :firstname and lastname = :lastname and email = :email"; 
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":firstname"=>$firstname, ":lastname"=>$lastname, ":email"=>$email));
		return $statement->fetchAll();
	}
}
?>