<?php
$id = $_GET["id"];

$pass = $_POST["pwd"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];
$email = $email1 . "@" . $email2;

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "update members set pass='$pass', name='$name' , email='$email'";
$sql .= " where id='$id'";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
          <script>
              location.href = 'pensionHome.php';
          </script>
      ";
?>

   
 ?> ?>