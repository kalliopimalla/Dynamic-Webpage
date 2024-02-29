<?php



$host="webpagesdb.it.auth.gr:3306";

$user="root";

$password="password123";

$db="student3979partb";


$data=mysqli_connect($host,$user,$password,$db);

<div class="section2">
  <table>
    <tr>
      <td><strong>Αποστολέας:</strong></td>
      <td><?php echo $_POST['sender']; ?></td>
    </tr>
    <tr>
      <td><strong>Θέμα:</strong></td>
      <td><?php echo $_POST['subject']; ?></td>
    </tr>
    <tr>
      <td><strong>Κείμενο:</strong></td>
      <td><?php echo $_POST['message']; ?></td>
    </tr>
  </table>
</div>

?>
