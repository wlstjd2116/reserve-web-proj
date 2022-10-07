<?php
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
  /*  $con = mysqli_connect("localhost", "root", "", "test");
  /  $sql = "select A.house_id, max(A.house_name) as house_name, max(A.house_address) as
   house_address, max(A.contents) as contents, count(B.rs_id) as rsCount
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_name asc;";
  // $resultHouse = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($resultHouse);
   $row["house_name"];
   
   $row["house_address"];
   $houseid = $row["house_id"];
   $row["contents"];*/
   //$isReservation = false;
?>
<!DOCTYPE html>
<html>
<head>.
	<meta charset="utf-8">
	<title>펜션예약</title>
		<link rel="stylesheet" type="text/css" href = "./css/style.css">
		<link rel="stylesheet" type="text/css" href = "./css/member.css">
		<link rel="stylesheet" type="text/css" href = "./css/reservation.css"
		<script src="jquery.min.js"></script>
  		<script src="jquery-ui.min.js"></script>
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<div class="searchArea">
					<form>
						<input type="search" placeholder="Search">
						<span>검색</span>
					</form>
				</div>
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<?php
    					if(!$userid) {
					?>                
                			<li><a href="member_form.php">회원 가입</a> </li>
   					 <?php
   					 }
   					 
   					 else {
              			  $logged = $userid."님";
						?>
                <li><?=$logged?> </li>
                <li><a href="logout.php">로그아웃</a> </li>
<?php
    }
?>
				<li><?php
    					if(!$userid) {
					?>
					</ul>
						<form method="post" action="login.php">
							<div class="whitefont">
							ID:<input type="textbox" name="id" placeholder="ID">
							PW:<input type="password" name="pass" placeholder="PW"></div>
							<button onclick="javascript:document.frm.submit();">로그인</button>
						</form>
					</li>	
					                
   					 <?php
   					 }
   					 ?>
						
			</div>
			<section>
		<!--<div class="intro_bg">
           <img src="./img/main_img.jpg" width="100%" height="200px">
        </div>-->
        
        <div id="main_content">
      		<div id="join_box">
          	<form  name="frame" method="post" action="reservation_ok.php">
          		<input type="hidden" name="insert_houseid" id="insert_houseid" value=<?=$houseid?>>
          		<h2>펜션ID : <?=$_POST["insert_houseid"];?></h2>
			    <h2>펜션이름: <?=$_POST["divHouseName"];?></h2>
			       	<div class="form">
				        <div class="col1">예약날짜</div>
				        <div class="col2">
							<input type="text" name="reservation_date" id="reservation_date" placeholder="예약날짜">
				        </div>                 
			       	<div class="form">
				        <div class="col1">숙박 인원</div>
				        <div class="col2">
							<input type="text" name="total_man" id="total_man" placeholder="인원수">
				        </div>                 
			       	</div>             
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       <div style="width:100%; height:33px; margin-top:30px; text-align: center;">
			<button style = "background-color:grey; color:white; border:1px solid #222222" onclick="javaReservation();">예약하기</button>
		</div>
     
</form>

</div>
</div>
	</div>


</body>
<script>
	function execReservation(houseID, houseName)
	{
		$("#insert_houseid").val(houseID);
		$("#divHouseName").html(houseName);
	}

	function saveReservation(houseID)
	{
		$("insert_houseid").val(houseID);
		if(!$.trim($("#reservation_date").val()))
		{
			alert("예약날짜를 입력해주십시오");
			return false;
		}
		if(!$.trim($("#total_man").val()))
		{
			alert("숙박인원을 입력해주십시오");
			return false;
		}
		if(isNaN($("#total_man").val()))
		{
			alert("숙박인원을 숫자로 입력해주십시오");
			return false;
		}
		document.frame.submit();
	}
</script>
</html>