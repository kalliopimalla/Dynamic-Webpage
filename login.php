<!DOCTYPE html>
<html lang="el">

<!-- Τίτλος σελίδας -->

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Σελίδα Πιστοποίησης </title>
<link rel="stylesheet" href="login.css"/>
</head>


<!-- Κύριο μέρος ιστοσελίδας  -->

<body>


<center>

<div class="text1">
<p><b>Πιστοποίηση</b></p>
</div>

<?php 

					error_reporting(0);
					session_start();
					session_destroy();
			
				echo $_SESSION['loginMessage'];
			

					?>





<form action="login_check.php" method="POST" class="login_form">
				
				<div>
					<label class="labellogin">Login</label>
					<input type="text" name="username" class="textlogin">
				</div>
                
<br>
<br>

				<div>
					<label class="labelpassw">Password</label>
					<input type="Password" name="password" class="textpassw">
				</div>

<br>
<br>
				<div>
					<button type="submit" class="btn">Σύνδεση</button>
				</div>

			</form>
			
</center>

</body>
</html>
