<?php

session_start();


$host="webpagesdb.it.auth.gr:3306";

$user="root";

$password="password123";

$db="student3979partb";


$data=mysqli_connect($host,$user,$password,$db);

if($_GET['student_id'])
{
	$user_id=$_GET['student_id'];
	$sql="DELETE FROM users WHERE username='$user_id'";
	
	$result=mysqli_query($data,$sql);
	
	if($result)
	{
	$_SESSION['message']="Delete Student is Successful";
	header("location:UserDetailsTutor.php");
	}
	
}



?>