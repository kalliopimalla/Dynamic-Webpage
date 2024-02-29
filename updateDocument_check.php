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
if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['path']) ) 
	{ $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $path = $_POST['path'];
    

    // Ενημέρωση των δεδομένων του εγγράφου στη βάση δεδομένων
    $sql = "UPDATE documents SET id='$id', title='$title', description='$description', path='$path' WHERE id=$id";


    if (mysqli_query($data, $sql)) {
		
		$_SESSION['message']="Το έγγραφο ενημερώθηκε επιτυχώς";

	    header("location:documentTutor.php");
		

    } else {
		$_SESSION['message']="Apply Failed";

	      header("location:updateDocument.php");
       
    }
}

// Κλείσιμο σύνδεσης
mysqli_close($data);
?>
