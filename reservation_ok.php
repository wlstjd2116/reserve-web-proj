<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
   $con = mysqli_connect("localhost", "root", "", "test");
   $sql = "select house_id,rs_year, rs_month, rs_day from tb_house_reservation where (house_id = ".$_POST['insert_houseid']." and rs_year = ".$_POST['reservation_year']." and rs_month = ".$_POST['reservation_month']." and rs_day = ".$_POST['reservation_day'].");";
   $result = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result);
   $timenow = date("Y-m-d H:i:s");
   
   if(empty($row["house_id"])==false){
   	?>
   		<script>
   			alert("해당 날짜에 예약이 불가능합니다.");
   			location.replace("reservation.php");
   		</script>
   		<?php
   }
   else{
   		$sql = " insert into tb_house_reservation(user_id, house_id, rs_year, rs_month, rs_day, tot_man, insert_date) values('".$_SESSION['userid']."','".$_POST["insert_houseid"]."','".$_POST["reservation_year"]."','".$_POST["reservation_month"]."','".$_POST["reservation_day"]."','".$_POST["total_man"]."',now()) ";
   		$result = mysqli_query($con, $sql);
   	?>
   	 <script>		
		alert("정상적으로 예약이 완료되었습니다.");
		location.replace("reservation.php");
	</script>
	<?php
   }
   ?>
  