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
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    $maintext= $_POST['maintext'];
	
	$sql="INSERT INTO announcements(id,date,topic,maintext) 
	VALUES('$id','$date','$topic','$maintext')";
	
	$result=mysqli_query($data,$sql);
	
	if($result)
	{
		$_SESSION['message']="New announcement added successful";

	    header("location:addAnnouncement.html");
	}
	else
	{
		$_SESSION['message']="Apply Failed";

	    header("location:addAnnouncement.html");
		
	}
	
}





?>
