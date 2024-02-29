<?php

// Κάνετε σύνδεση στη βάση δεδομένων

$host = "webpagesdb.it.auth.gr:3306";
$user = "root";
$password = "password123";
$db = "student3979partb";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

// Καταχωρείτε ένα νέο mail

if (isset($_POST['apply'])) {
    $sender = $_POST['sender'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Ανάκτηση του τελευταίου id
    $sql_last_id = "SELECT MAX(id) AS max_id FROM mail";
    $result_last_id = mysqli_query($data, $sql_last_id);
    $row_last_id = mysqli_fetch_assoc($result_last_id);
    $last_id = $row_last_id['max_id'];

    // Αύξηση του id κατά ένα
    $new_id = $last_id + 1;

    // Εισαγωγή του νέου mail με το αυξημένο id
    $sql = "INSERT INTO mail (id, sender, subject, message) VALUES ('$new_id', '$sender', '$subject', '$message')";
    $result = mysqli_query($data, $sql);

    if ($result) {
		$_SESSION['message']="New mail added successfully";

	    header("location:communicationStudent.php");
    } else {
       $_SESSION['message']="Apply failed";

	    header("location:communicationStudent.php");
    }
}

?>
