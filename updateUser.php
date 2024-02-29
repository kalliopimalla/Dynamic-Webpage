<?php

// Σύνδεση στη βάση δεδομένων
$host = "webpagesdb.it.auth.gr:3306";
$user = "root";
$password = "password123";
$db = "student3979partb";

$data = mysqli_connect($host, $user, $password, $db);

$student_id=$_GET['id'];

$sql="SELECT * FROM users WHERE username='$student_id' ";
$result = mysqli_query($data, $sql);
$info=$result->fetch_assoc();

if ($data === false) {
    die("Σφάλμα σύνδεσης");
}



if(isset($_POST['update']))
{
	 $name = $_POST['name'];
     $surname= $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype= $_POST['usertype'];
	
	$query = "UPDATE users SET name='$name', surname='$surname', username='$username', password='$password' ,usertype='$usertype' WHERE username=$student_id";
    $result2 = mysqli_query($data, $query);
	
	if($result2)
	{
		header("location:UserDetailsTutor.php");
	}
}




?>



<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Χρήστη</title>
    <link rel="stylesheet" href="login.css"/>
</head>

<center>
<div class="text1">
<p><b>Επεξεργασία χρήστη</b></p>
</div>


<body>
    <form action="#" method="POST" class="login_form">
	                <div>
	                 <label for="name" class="labelpassw">Όνομα:</label><br>
                    <input type="text" class="textpassw" id="name" name="name" value="<?php echo"{$info['name']}"; ?>"><br>
                   </div> 
				   
				    <div>
                    <label for="surname" class="labelpassw">Επώνυμο:</label><br>
                    <input type="text" class="textpassw" id="surname" name="surname" value="<?php echo"{$info['surname']}"; ?>"><br>
                    </div>
			
				    <div>
                    <label for="username" class="labelpassw">Login Name:</label><br>
                    <input type="email" class="textpassw" id="username" name="username" value="<?php echo"{$info['username']}"; ?>"><br>
                     </div>
					 
				    <div>
                    <label for="password" class="labelpassw">Password:</label><br>
                    <input type="text" class="textpassw" id="password" name="password" value="<?php echo"{$info['password']}"; ?>"><br>
                     </div>
					 
				    <div>
                    <label class="labelpassw">Ρόλος:</label>
                    <input type="radio" id="student" name="usertype" value="student" <?php echo"{$info['usertype']}";  ?>>
                    <label for="student">Student</label>
                    <input type="radio" id="tutor" name="usertype" value="tutor" <?php echo"{$info['usertype']}";  ?>>
                    <label for="tutor">Tutor</label>
                    </div>
					
				    <div>
                    <br>
                    <input type="submit" name="update" value="Αποθήκευση" class="btn">
					</div>
</form>					
				    <div>
                    <br>
                    <a href='UserDetailsTutor.php'><button class="btn" align="right">Back</button></a>
                    </div>
				    
					 

	


	
</body>
</center>
</html>
