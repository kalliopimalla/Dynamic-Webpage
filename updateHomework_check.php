<?php
// Σύνδεση στη βάση δεδομένων
$host = "webpagesdb.it.auth.gr:3306";
$user = "root";
$password = "password123";
$db = "student3979partb";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Σφάλμα σύνδεσης");
}
// Έλεγχος αν έχουν σταλεί δεδομένα από τη φόρμα επεξεργασίας
if (isset($_POST['id']) && isset($_POST['goals']) && isset($_POST['details']) && isset($_POST['required']) && isset($_POST['deadline'])) 
	{ $id = $_POST['id'];
     $details= $_POST['details'];
    $goals = $_POST['goals'];
    $required = $_POST['required'];
    $deadline= $_POST['deadline'];
    

    // Ενημέρωση των δεδομένων των εργασιών στη βάση δεδομένων
    $sql = "UPDATE homeworks SET id='$id', goals='$goals', details='$details', required='$required' ,deadline='$deadline' WHERE id=$id";


    if (mysqli_query($data, $sql)) {
		
		$_SESSION['message']="Η εργασία ενημερώθηκε επιτυχώς";

	    header("location:homeworkTutor.php");
		

    } else {
		$_SESSION['message']="Apply Failed";

	      header("location:updateHomework.php");
       
    }
}

// Κλείσιμο σύνδεσης
mysqli_close($data);
?>
