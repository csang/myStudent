<?
if(isset($_SESSION["loggedin"])){
	
	if($_SESSION["loggedin"]==1){

	}else{
		header("location: ../index.php?controllers=home");	
	}
}else{
	header("location: ../index.php?controllers=home");		
}
?>