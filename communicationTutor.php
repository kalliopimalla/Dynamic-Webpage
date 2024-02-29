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


	
	$sql="SELECT * from mail";
	
	$result=mysqli_query($data,$sql);
	$info = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html lang="el">
 
<!-- Τίτλος σελίδας -->
 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Επικοινωνία</title>
<link rel="stylesheet" href="communication.css"/>
</head>

<!-- Κύριο μέρος ιστοσελίδας  -->
<body>

<!-- Επικεφαλίδα  -->
<header>
<div align="center" >
<h1> Επικοινωνία</h1>
</div>

<div align="right" >
<a href="logout.php"><button class="btn" align="right">Αποσύνδεση</button></a> 
</div>

</header>

<!-- Το frame που θα χωρίζει το menu με το υπόλοπο περιεχόμενο της σελίδας  -->
<div class="container">

<nav>

<div align="center">
<div class="btn">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<br>
<a href="http://localhost/3979partB/indexTutor.php"><button class="btn"><i class="fa fa-home"></i> Αρχική σελίδα</button></a>
<br>
<a href="http://localhost/3979partB/announcementTutor.php"><button class="btn"><i class="fa fa-bars"></i> Ανακοινώσεις</button></a>
<br>
<button class="btn"><i class="fa fa-phone"></i> Επικοινωνία</button></a>
<br>
<a href="http://localhost/3979partB/documentTutor.php"><button class="btn"><i class="fa fa-folder"></i> Έγγραφα μαθήματος</button></a>
<br>
<a href="http://localhost/3979partB/homeworkTutor.php"><button class="btn"><i class="fa fa-folder"></i> Εργασίες</button></a>
<br>
<a href="http://localhost/3979partB/UserDetailsTutor.php"><button class="btn"><i class="fa fa-bars"></i> Διαχείρηση μαθητών</button></a>
<br>



</div>
</div>
</nav>

<!-- Το κεντρικό περιεχόμενο της σελίδας  -->
<main>
<div align="center">

<div class="header1">
<div align="center" >
<h2> Email μαθητών</h2>
</div>
</div>


<table border="1px">
<tr>
<th style="padding:20px; font-size:15px;">sender</th>
<th style="padding:20px; font-size:15px;" >subject</th>
<th style="padding:20px; font-size:15px;" >message</th>
</tr>

<?php
while ($info) {
?>

        <tr>
            <td style="padding:20px;"><?php echo $info['sender']; ?></td>
            <td style="padding:20px;"><?php echo $info['subject']; ?></td>
            <td style="padding:20px;"><?php echo $info['message']; ?></td>
        </tr>

<?php
    $info = mysqli_fetch_assoc($result);
}
?>
</table>
</div>
</main>


</body>
</html>