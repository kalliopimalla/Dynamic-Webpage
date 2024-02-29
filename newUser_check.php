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
	$name = $_POST['name'];
    $surname = $_POST['surname'];
    $username= $_POST['username'];
    $password= $_POST['password'];
	$usertype=$_POST['usertype'];
	
	
	$check="SELECT * FROM users WHERE username = '$username'";
	$check_user=mysqli_query($data,$check);
	$row_count=mysqli_num_rows($check_user);
	
		$sql="INSERT INTO users(name,surname,username,password,usertype) 
	VALUES('$name','$surname','$username','$password','$usertype')";
	
	$result=mysqli_query($data,$sql);
	
	if($row_count==1)
	{   $_SESSION['message']="Username already exist .Try another one";
		header("location:addUser.php");
	}
	else
    {
	

		if($result)
		{
			$_SESSION['message']="New user added successful";

			header("location:addUser.html");
		}
		else
		{
			$_SESSION['message']="Apply Failed";

			header("location:addUser.html");
			
		}
	}
	
}


?>
