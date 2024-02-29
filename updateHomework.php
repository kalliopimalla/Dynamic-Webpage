<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επεξεργασία Εργασίας </title>
	<link rel="stylesheet" href="login.css"/>
</head>

<center>
<body>
    <h2>Επεξεργασία Εργασίας</h2>
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

    <form action="updateHomework_check.php" method="POST" class="login_form">
      <?php
// Ελέγχουμε αν υπάρχει τιμή στο πεδίο ID από την προηγούμενη σελίδα
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Καταχωρούμε το ID ως κρυφό πεδίο για να το περάσουμε στην επόμενη φόρμα
    echo '<input type="hidden" name="id" value="' . $id . '">';
    // Επιλέγουμε το έγγραφο με βάση το ID
    $sql = "SELECT * FROM homeworks WHERE id=$id";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_assoc($result);
    
}
?>




 <label for="goals" class="labelpassw">Στόχοι:</label><br>
<input type="text" class="textpassw" id="goals" name="goals" value="<?php echo $row['goals']; ?>"><br>

<label for="details" class="labelpassw">Εκφώνηση:</label><br>
 <textarea id="details" class="textpassw" name="details" rows="4" cols="50"><?php echo $row['details']; ?></textarea><br>
 
 <label for="required" class="labelpassw">Παραδοτέα:</label><br>
<input type="text" class="textpassw"  id="required" name="required" value="<?php echo $row['required']; ?>"><br> 

 <label for="deadline" class="labelpassw">Ημερομηνία παράδοσης:</label><br>
<input type="date" class="textpassw"  id="deadline" name="deadline" value="<?php echo $row['deadline']; ?>"><br> 

    <br>
    <input type="submit" value="Αποθήκευση" class="btn">
    </form>
	 
	<div  >
    <a href="homeworkTutor.php"><button class="btn" align="right">Back</button></a> 
    </div>
</body>
</center>
</html>
