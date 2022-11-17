<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}

$date = $_POST["datepicker1"];
$date2 = date("Y-m-d", strtotime($date));
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select house_id,rs_year, rs_month, rs_day from tb_house_reservation where (house_id = " . $_POST["insert_houseid"] . " and rs_date = '" . $date2 . "')";
$sql2 = "select * from tb_house where (house_id = " . $_POST["insert_houseid"] . " )";

$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result);
$row2 = mysqli_fetch_array($result2);

$timenow = strtotime(date("Y-m-d H:i:s"));
$timetarget = strtotime($date2 . " 00:00:00");

if (empty($row["house_id"]) == false || $timenow > $timetarget) { ?>
   		<script>
   			alert("해당 날짜에 예약이 불가능합니다.");
         location.replace("reservation.php");
   		</script>
   		<?php } else {if ($_POST["total_man"] <= $row2["max_people"]) {

    $sql =
      " insert into tb_house_reservation(user_id, house_id, tot_man, insert_date, rs_date) values('" .
      $_SESSION["userid"] .
      "','" .
      $_POST["insert_houseid"] .
      "','" .
      $_POST["total_man"] .
      "',now(), '" .
      $date2 .
      "' )";
    $result = mysqli_query($con, $sql);
    ?>
   	 <script>		
		alert("정상적으로 예약이 완료되었습니다.");
		location.replace("reservation.php");
	</script>
	<?php
  } else {
     ?>
    <script>
      alert("최대 인원 수를 초과합니다.");
      location.replace("reservation.php");
    </script>
  <?php
  }}
?>
<!-- 
<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}

$date2 = $_POST["datepicker1"];
$date = $_POST["datepicker1"];
$dates = explode("-", $date);
$yr = $dates[0];
$mnth = $dates[1];
$day = $dates[2];
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select house_id,rs_year, rs_month, rs_day from tb_house_reservation where (house_id = " . $_POST["insert_houseid"] . " and rs_date =" . $date2 . " )";
$sql2 = "select * from tb_house where (house_id = " . $_POST["insert_houseid"] . " )";

$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result);
$row2 = mysqli_fetch_array($result2);

$timenow = strtotime(date("Y-m-d H:i:s"));
$timetarget = strtotime($yr . "-" . $mnth . "-" . $day . " 00:00:00");
?> -->
