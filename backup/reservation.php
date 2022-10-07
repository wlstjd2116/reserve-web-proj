<?php
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    $con = mysqli_connect("localhost", "root", "", "test");
    $sql = "select A.house_id, max(A.house_name) as house_name, max(A.house_address) as
   house_address, max(A.contents) as contents, count(B.rs_id) as rsCount
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_name asc;";
   $resultHouse = mysqli_query($con, $sql);
   //$isReservation = false;
?>
<!DOCTYPE html>
<html>
<head>.
	<meta charset="utf-8">
	<title>펜션예약</title>
	  <script src="jquery.min.js"></script>
  <script src="jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href = "./css/style.css">
		<link rel="stylesheet" type="text/css" href = "./css/member.css">
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<div class="searchArea">
				</div>
				<ul class="nav">
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="#">RESERVATION STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					<li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
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
						<form id="frm" name="frm" method="post" action="login.php">
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
			<div class = "intro_text">
				<!--<h1><img src="image/logo.png" width="400px" height="300px"></iframe></h1>-->
				<div class="moongoo">프라이빗한 힐링, T&R에서</h4>
			</div>
		</div>
	<div style="width:1000px; margin:0px auto; background-color: white; margin-top:30px">
		<table style="width: 100%;">
			<tr style="height: 33px; background-color:grey; color:white; text-align: center;">
				<td>
					No.
				</td>
				<td>
					펜션 이름
				</td>
				<td>
					주소
				</td>
				<td>
					설명
				</td>
				<td>
					예약
				</td>
			</tr>
			<?php
				$idx = 1;
				while($row = mysqli_fetch_array($resultHouse))
				{
					$isReservation = false;
					if($row["rsCount"] > 0)
					{
						$isReservation = true;
					}
					?>
						<tr style="height: 33px; text-align:center">
							<td>
								<div style="color: black;"><?php echo "$idx"; ?></div>
							</td>
							<td>
								<div style="color: black;"><?=$row["house_name"];?></div>
							</td>
							<td>
								<div style="color: black;"><?=$row["house_address"];?></div>
							</td>
							<td>
								<div style="color: black;"><?=$row["contents"];?></div>
							</td>
							<td>
								<?
								if($isReservation)
								{
									?><div style="color: black;">이미 예약됨</div>
									<?
								}
								else
								{
									?>
									<a style="cursor:pointer; color:blue; text-decoration:underline" onclick="javascript:execReservation('<?=$row['house_id']?>','<?=$row['house_name']?>');">예약하기</a>
									<?php
									$idx++;
								}
								?>
							</td>
						</tr>
						<tr style ="height: 0px; text-align:center;">
							<td colspan="5" style="border-bottom: 1px solid #dddddd;"></td>
						</tr>
						<?
					}
					?>
			</table>
	</div>
	<div class="box box-success" style="width:500px; display:none; background-color:white; padding-top:15px; padding-bottom:15px" id="winReservation">
		<form name=frm method="post" action="reservation_ok.php">		
		<input type="hidden" name="insert_houseid" id="insert_houseid" value="">
		<div style="width:100%; height:33px; margin-left:20px">
			<div style="width:30%;float:left; color:black">
				펜션이름:
			</div>
			<div style="width:70%;float:left; color:black" id="divHouseName">
			</div>
		</div>
		<div style="width:100%; height:33px; margin-left:20px; color:black">
			<div style="width:30%;float:left; color:black">
				예약날짜:
			</div>
			<div style="width:70%;float:left">
				<input type="text" name="reservation_date" id="reservation_date" style="width:80px; color:black;">
			</div>
		</div>
		<div style="width:100%; height:33px; margin-left:20px">
			<div style="width:30%;float:left; color:black">
				숙박인원:
			</div>
			<div style="width:70%;float:left;color:black">
				<input type="text" name="total_man" id="total_man" style="width:50px;color:black">명
			</div>
		</div>
		</form>
		<div style="width:100%; height:33px; margin-top:30px; text-align:center">
			<button style="background-color:gray; color:white; border:1px solid #222222" onclick="javascript:saveReservation();">예약하기</button>
		</div>
	</div><!-- /.box -->
</body>
<script src="jquery.bpopup2.min.js" type="text/javascript"></script>
<script>
	function execReservation(houseID, houseName)
	{
		$("#insert_houseid").val(houseID);
		$("#divHouseName").html(houseName);

		$('#winReservation').bPopup();
	}

	function saveReservation()
	{
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
		document.frm.submit();
	}
</script>
</html>