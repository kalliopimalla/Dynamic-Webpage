

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


	
	$sql="SELECT * from users";
	
	$result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html lang="el">

<!-- Τίτλος σελίδας -->

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Διαχείρηση μαθητών </title>
<link rel="stylesheet" href="announcement.css"/>
</head>

<!-- Κύριο μέρος ιστοσελίδας  -->

<body>

<!-- Επικεφαλίδα  -->
<header>
<div align="center" >
<h1> Διαχείρηση μαθητών </h1>
</div>


<div align="right" >
<a href="logout.php"><button class="btn" align="right">Αποσύνδεση</button></a> 
</div>

</header>


<!-- Το frame που θα χωρίζει το menu με το υπόλοπο περιεχόμενο της σελίδας  -->
<div class="container">


<!-- το menu πλοήγησης που έχει όλες τις ιστοσελίδες του ιστότοπου  -->
<nav>

<div align="center">
<div class="btn">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<br>
<a href="http://localhost/3979partB/indexTutor.php"><button class="btn"><i class="fa fa-home"></i> Αρχική σελίδα</button></a>
<br>
<a href="http://localhost/3979partB/announcementTutor.php"><button class="btn"><i class="fa fa-bars"></i> Ανακοινώσεις</button></a>
<br>
<a href="http://localhost/3979partB/communicationTutor.php"><button class="btn"><i class="fa fa-phone"></i> Επικοινωνία</button></a>
<br>
<a href="http://localhost/3979partB/documentTutor.php"><button class="btn"><i class="fa fa-folder"></i> Έγγραφα μαθήματος</button></a>
<br>
<a href="http://localhost/3979partB/homeworkTutor.php"><button class="btn"><i class="fa fa-folder"></i> Εργασίες</button></a>
<br>
<button class="btn"><i class="fa fa-bars"></i> Διαχείρηση μαθητών</button></a>
<br>


</div>
</div>
</nav>

<!-- Το κεντρικό περιεχόμενο της σελίδας  -->
<main>
<div align="center">

<br>

<div class="text1" >
<a href="addUser.php"><button class="btn" align="right">Προσθήκη νέου μαθητή</button></a> 
</div>

<br>
<br>
<br>


<div class="header1">
<div align="center" >
<h2> Στοιχεία Μαθητών </h2>
<?php

if($_SESSION['message'])
{
	echo $_SESSION['message'];
}

unset($_SESSION['message']);
?>



</div>
</div>


<table border="1px">
<tr>

<th style="padding:20px; font-size:15px;">name</th>
<th style="padding:20px; font-size:15px;" >surname</th>
<th style="padding:20px; font-size:15px;" >username</th>
<th  style="padding:20px; font-size:15px;">password</th>
<th  style="padding:20px; font-size:15px;">usertype</th>
<th  style="padding:20px; font-size:15px;">Delete</th>
<th  style="padding:20px; font-size:15px;">Update</th>
</tr>

<?php
while ($info = $result->fetch_assoc()) {
    if ($info["usertype"] == "student") {
        ?>
        <tr>
            <td style="padding:20px;"><?php echo $info['name']; ?></td>
            <td style="padding:20px;"><?php echo $info['surname']; ?></td>
            <td style="padding:20px;"><?php echo $info['username']; ?></td>
            <td style="padding:20px;"><?php echo $info['password']; ?></td>
            <td style="padding:20px;"><?php echo $info['usertype']; ?></td>
		    <td style="padding:20px;"><?php echo "<a class='btn btn-primary' onClick=\"javascript:return confirm('Are you sure to delete this?');\" href='deleteUser.php?student_id={$info['username']}'>Delete </a>"; ?></td>
			<td style="padding:20px;"><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure to update this?');\" href='updateUser.php?id={$info['username']}'>Update </a>"; ?></td>
        </tr>
        <?php
    }
}
?>

</table>







</div>
</main>


</body>
</html>
