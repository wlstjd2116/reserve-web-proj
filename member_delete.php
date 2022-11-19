<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}

$sql = "delete from members where id = '$userid'";
$con = mysqli_connect("localhost", "root", "", "test");
$result = mysqli_query($con, $sql);
echo "<script>location.href='./pensionHome.php';</script>";

session_destroy();
?>
