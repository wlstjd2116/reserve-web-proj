<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}

//if($_SESSION["userid"]){
?>
  		<!--<script>
  			//location.replace("reservation.php");
  		</script>-->
  		<?php
//exit;
// }
?>
<!doctype html>
<meta charset="utf-8">
<title>허니블루</title>
		<link rel="stylesheet" type="text/css" href = "./css/style_room.css">
		<link rel="stylesheet" type="text/css" href = "./css/common.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<head>
 
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="reservation_status.php">RESERVATION STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					
					<?php if (!$userid) { ?>                
                			<li><a href="member_form.php">회원 가입</a> </li>
   					 <?php } else {$logged = $userid . "님"; ?>
                
						<li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
						<li><?= $logged ?> </li>
                <li><a href="member_modify_form.php">정보수정</a></li>
                <li><a href="logout.php">로그아웃</a> </li>
<?php } ?>
				<li><?php if (!$userid) { ?>
					</ul>
						<form id="frm" name="frm" method="post" action="login.php">
							<div class="whitefont">
							ID:<input type="textbox" name="id" placeholder="ID">
							PW:<input type="password" name="pass" placeholder="PW">
							<button style ="color: black;" onclick="javascript:document.frm.submit();">로그인</button>
							</div>
						</form>
					</li>	
					                
   					 <?php } ?>
   					</ul>

   				</div>
   			</div>
<div class="r_wrap">
	<div class = "rm_wrap">
		<div class = "rm_title">
			<span>허니블루(HoneyBlue)</span>
		</div>
		
		
		<center><img src="./room/blue1.jpg" width="600px" height="320px"></center>
		<div class="rm_explain">
        허니블루(Honey Blue)는<br>

        1층 다이닝룸과 2층 침실이 복층으로 나뉘어져 있어<br>

        여유롭고 낭만적인 룸입니다<br>
        <br>


        계곡과 숲이 내려다 보이는 실내 스파(Spa)와<br>

        독립적인 개별바비큐 테라스가<br>

        사랑하는 사람과의 근사하고 프라이빗한 휴식을 보장합니다<br>

        <br>

        허니블루(Honey Blue)에서<br>

       사랑하는 사람과 달콤한 아침을 맞이하세요!<br>
		<br><br>
		<a href="#" class = "btn btn-dark">실시간 예약</a>
		<br>
		<br><br><br>
		<strong>객실정보</strong><br>

		원룸, 스파, 개별바비큐<br>
		<strong>가능인원</strong><br>

		기준 4명 / 최대 8명<br>
		<strong>입실안내</strong><br>

		오후3시 이후 입실 / 오전 11시 이전 퇴실<br>

		<strong>구비시설</strong><br>

		<strong>VILLA</strong><br>

		침대Q 1개, 호텔식침구, 스파, LED TV, 에어컨, 와이파이, 소화기<br>

		<strong>KITCHEN </strong><br>

		아일랜드식탁, 냉장고, 전자렌지, 전기밥솥, 인덕션, 식기류, 조리기구<br>

		<strong>BATHROOM</strong><br>

		헤어샴푸, 린스, 헤어드라이기, 타올, 휴지,각티슈
		</div> 
		<div class ="show_img">
		<center><img src="./room/blue2.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/blue3.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/blue4.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/blue5.jpg" width="1000px" height="600px"></center>
	   			<center><img src="./room/blue6.jpg" width="1000px" height="600px"></center>
                <center><img src="./room/blue7.jpg" width="1000px" height="600px"></center>
   			<center><div class="room_rs">
		</div>
	</div>
</div> <!-- wrap end -->
	   			
<?php include "./footer.php"; ?>
   		</div>
   	</body>