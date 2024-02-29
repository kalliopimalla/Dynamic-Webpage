<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Εγγράφου </title>
	<link rel="stylesheet" href="login.css"/>
</head>

<center>
<body>
    <h2>Επεξεργασία Εγγράφου</h2>
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

    <form action="updateDocument_check.php" method="POST" class="login_form">
      <?php
// Ελέγχουμε αν υπάρχει τιμή στο πεδίο ID από την προηγούμενη σελίδα
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Καταχωρούμε το ID ως κρυφό πεδίο για να το περάσουμε στην επόμενη φόρμα
    echo '<input type="hidden" name="id" value="' . $id . '">';
    // Επιλέγουμε το έγγραφο με βάση το ID
    $sql = "SELECT * FROM documents WHERE id=$id";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_assoc($result);
    
}
?>




 <label for="title" class="labelpassw">Τίτλος:</label><br>
<input type="text" class="textpassw" id="title" name="title" value="<?php echo $row['title']; ?>"><br>
<label for="description" class="labelpassw">Περιγραφή:</label><br>
 <textarea id="description" class="textpassw" name="description" rows="4" cols="50"><?php echo $row['description']; ?></textarea><br>
 <label for="path" class="labelpassw">Όνομα/θέση αρχείου:</label><br>
<input type="text" class="textpassw"  id="path" name="path" value="<?php echo $row['path']; ?>"><br> 
    <br>
    <input type="submit" value="Αποθήκευση" class="btn">
    </form>
	 
	<div  >
    <a href="documentTutor.php"><button class="btn" align="right">Back</button></a> 
    </div>
</body>
</center>
</html>
