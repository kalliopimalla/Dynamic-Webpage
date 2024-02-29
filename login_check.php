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

		
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name = $_POST['username'];

		$pass = $_POST['password'];


		$sql="select * from users where username='".$name."' AND password='".$pass."'  ";

		$result=mysqli_query($data,$sql);

		$row=mysqli_fetch_array($result);



		if($row["usertype"]=="student")
		{
              
			$_SESSION['username']=$name;

			$_SESSION['usertype']="student";

			header("location:indexStudent.php");
		}

		elseif($row["usertype"]=="tutor")
		{	
			$_SESSION['username']=$name;

			$_SESSION['usertype']="tutor";

			header("location:indexTutor.php");
		}

		else
		{
			

			$message= "username or password do not match";

			$_SESSION['loginMessage']=$message;

			header("location:login.php");
		}


	}


?>
