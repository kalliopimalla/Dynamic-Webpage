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
    $title = $_POST['title'];
    $description = $_POST['description'];
    $path= $_POST['path'];
	
	$sql="INSERT INTO documents(id,title,description,path) 
	VALUES('$id','$title','$description','$path')";
	
	$result=mysqli_query($data,$sql);
	
	if($result)
	{
		$_SESSION['message']="New announcement added successful";

	    header("location:addDocument.html");
	}
	else
	{
		$_SESSION['message']="Apply Failed";

	    header("location:addDocument.html");
		
	}
	
}


?>
