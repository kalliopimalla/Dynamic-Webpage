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
if (isset($_POST['id']) && isset($_POST['date']) && isset($_POST['topic']) && isset($_POST['maintext']) ) 
	{ $id = $_POST['id'];
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    $maintext = $_POST['maintext'];
    

    // Ενημέρωση των δεδομένων της ανακοίνωσης στη βάση δεδομένων
    $sql = "UPDATE announcements SET id='$id', date='$date', topic='$topic', maintext='$maintext' WHERE id=$id";


    if (mysqli_query($data, $sql)) {
		
		$_SESSION['message']="Η ανακοίνωση ενημερώθηκε επιτυχώς";

	    header("location:announcementTutor.php");
		

    } else {
		$_SESSION['message']="Apply Failed";

	      header("location:updateAnnoun.php");
       
    }
}

// Κλείσιμο σύνδεσης
mysqli_close($data);
?>
