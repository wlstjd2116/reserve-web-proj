<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";


	$con = mysqli_connect("localhost", "root", "", "test");
    $sql = " insert into tb_house_reservation(user_id, house_id, rs_date, tot_man, insert_date) values('".$_SESSION['userid']."','".$_POST["insert_houseid"]."','".$_POST["reservation_date"]."','".$_POST["total_man"]."',now()) ";
   $result = mysqli_query($con, $sql);
?>
<script>
	alert("정상 예약되었습니다");
	location.replace("reservation.php");
</script>