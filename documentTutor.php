<!DOCTYPE html>
<html lang="el">

<!-- Τίτλος σελίδας -->

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Έγγραφα μαθήματος</title>
<link rel="stylesheet" href="documents.css"/>
</head>


<!-- Κύριο μέρος ιστοσελίδας  -->
<body>


<!-- Επικεφαλίδα  -->
<header>
<div align="center" >
<h1> Έγγραφα μαθήματος</h1>
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
<a href="http://localhost/3979partB/communicationTutor.php"><button class="btn"><i class="fa fa-phone"></i> Επικοινωνία</button></a>
<br>
<button class="btn"><i class="fa fa-folder"></i> Έγγραφα μαθήματος</button></a>
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


<br>

<div class="text1" >
<a href="addDocument.php"><button class="btn" align="right">Προσθήκη νέου εγγράφου</button></a> 
</div>
<br>
<br>
<br>
<hr align="right" width="90%">



<?php

// Σύνδεση στη βάση δεδομένων

$host="webpagesdb.it.auth.gr:3306";

$user="root";

$password="password123";

$db="student3979partb";


$data=mysqli_connect($host,$user,$password,$db);


if($data===false)
{
	die("connection error");
}

// Εάν πατηθεί το κουμπί "Διαγραφή"
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Διαγραφή του εγγράφου από τη βάση δεδομένων
    $sql = "DELETE FROM documents WHERE id = $delete_id";

    if ($data->query($sql) === TRUE) {
        echo "Το έγγραφο διαγράφηκε με επιτυχία";
    } else {
        echo "Σφάλμα κατά τη διαγραφή του εγγράφου: " . $conn->error;
    }
}// Ανάκτηση εγγράφων από τη βάση δεδομένων
$sql = "SELECT * FROM documents";
$result = $data->query($sql);

if ($result->num_rows > 0) {
    // Εμφάνιση ανακοινώσεων
    while($row = $result->fetch_assoc()) {
        echo "<div class='header1'>";
        echo "<div align='left'>";
	   echo "<h2>" . $row["title"] . " <a href='?delete_id=" . $row["id"] . "'>[Διαγραφή] <a href='updateDocument.php?id=" . $row["id"] . "'>[Επεξεργασία]</a> </h2>";
        echo "</div>";
        echo "</div>";
        echo "<p> " . $row["description"] . "</p>";
       echo "<p><a href='" . $row["path"] . "'>Download</a></p>";

        echo "<hr align='right' width='90%'>";
    }
} else {
    echo "Δεν υπάρχουν έγγραφα";
}

$data->close();
?>





<!--Η επιλογή top οδηγεί στην κορυφή της ιστοσελίδας  -->
<footer>
<div align="right">
<a href="#top">top</a>
<div>
</footer>

</div>
</main>



</body>
</html>
