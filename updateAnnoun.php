<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Ανακοίνωσης</title>
	<link rel="stylesheet" href="login.css"/>
</head>

<center>
<body>
    <h2>Επεξεργασία Ανακοίνωσης</h2>
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
    ?>

    <form action="updateAnnouncement_check.php" method="POST" class="login_form">
      <?php
// Ελέγχουμε αν υπάρχει τιμή στο πεδίο ID από την προηγούμενη σελίδα
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Καταχωρούμε το ID ως κρυφό πεδίο για να το περάσουμε στην επόμενη φόρμα
    echo '<input type="hidden" name="id" value="' . $id . '">';
    // Επιλέγουμε την ανακοίνωση με βάση το ID
    $sql = "SELECT * FROM announcements WHERE id=$id";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_assoc($result);
    
}
?>




 <label for="topic" class="labelpassw">Θέμα:</label><br>
<input type="text" class="textpassw" id="topic" name="topic" value="<?php echo $row['topic']; ?>"><br>
<label for="maintext" class="labelpassw">Κείμενο:</label><br>
 <textarea id="maintext" class="textpassw" name="maintext" rows="4" cols="50"><?php echo $row['maintext']; ?></textarea><br>
 <label for="date" class="labelpassw">Ημερομηνία:</label><br>
<input type="date" class="textpassw"  id="date" name="date" value="<?php echo $row['date']; ?>"><br> 
    <br>
    <input type="submit" value="Αποθήκευση" class="btn">
    </form>
	 
	<div  >
    <a href="announcementTutor.php"><button class="btn" align="right">Back</button></a> 
    </div>
</body>
</center>
</html>
