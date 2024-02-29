<?php 

error_reporting(0);
session_start();


$host="webpagesdb.it.auth.gr:3306";

$user="root";

$password="password123";

$db="student3979partb";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("connection error");
}




if(isset($_POST['apply']))
{
	$id = $_POST['id'];
    $goals = $_POST['goals'];
    $details= $_POST['details'];
    $required= $_POST['required'];
	$deadline=$_POST['deadline'];
	
	
	$sql="INSERT INTO homeworks(id,goals,details,required,deadline) 
	VALUES('$id','$goals','$details','$required','$deadline')";
	
	$result=mysqli_query($data,$sql);
	
	if($result)
	{
		$_SESSION['message']="New homework added successful";

	    header("location:addHomework.html");
	}
	else
	{
		$_SESSION['message']="Apply Failed";

	    header("location:addHomework.html");
		
	}
	
}


?>
