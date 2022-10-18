<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}

$date = $_POST["datepicker"];
$date = explode("-", $date);
$yr = $date[0];
$mnth = $date[1];
$day = $date[2];
$con = mysqli_connect("localhost", "root", "", "test");
$sql =
  "select house_id,rs_year, rs_month, rs_day from tb_house_reservation where (house_id = " .
  $_POST["insert_houseid"] .
  " 
   and rs_year = " .
  $yr .
  " and rs_month = " .
  $mnth .
  " and rs_day = " .
  $day .
  ");";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$timenow = strtotime(date("Y-m-d H:i:s"));
$timetarget = strtotime($yr . "-" . $mnth . "-" . $day . " 00:00:00");

if (empty($row["house_id"]) == false || $timenow > $timetarget) { ?>
   		<script>
   			alert("해당 날짜에 예약이 불가능합니다.");
   			location.replace("reservation.php");
   		</script>
   		<?php } else {
  $sql =
    " insert into tb_house_reservation(user_id, house_id, rs_year, rs_month, rs_day, tot_man, insert_date) values('" .
    $_SESSION["userid"] .
    "','" .
    $_POST["insert_houseid"] .
    "','" .
    $yr .
    "','" .
    $mnth .
    "','" .
    $day .
    "','" .
    $_POST["total_man"] .
    "',now()) ";
  $result = mysqli_query($con, $sql);
  ?>
   	 <script>		
		alert("정상적으로 예약이 완료되었습니다.");
		location.replace("reservation.php");
	</script>
	<?php }
?>
   ?> ?> ?> ?> ?> ?>