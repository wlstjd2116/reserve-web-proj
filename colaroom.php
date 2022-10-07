<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
	
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
<title>T&R 숙소 예약 홈페이지</title>
		<link rel="stylesheet" type="text/css" href = "./css/style.css">
<head>
 
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<!--<li><a href="pensionHome.php">HOME</a></li>-->
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="reservation_status.php">RESERVATION STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					
					<?php
    					if(!$userid) {
					?>                
                			<li><a href="member_form.php">회원 가입</a> </li>
   					 <?php
   					 }
   					 
   					 else {
              			  $logged = $userid."님";
						?>
                
						<li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
						<li><?=$logged?> </li>
                <li><a href="member_modify_form.php">정보수정</a></li>
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
							PW:<input type="password" name="pass" placeholder="PW">
							<button style ="color: black;" onclick="javascript:document.frm.submit();">로그인</button>
							</div>
						</form>
					</li>	
					                
   					 <?php
   					 }
   					 ?>
   					</ul>

   				</div>
   			</div>
   			<div style="position: relative; left: 43%; margin-top: 60px">
   				<h3 style="font-size: bold; color:black"> 프라이빗한 휴식은 ColaRoom 에서
   			</div>
   			<div style="position: relative; left: 26%; margin-top: 60px;"><img src="./cola/cola1.jpg" width="1000px" height="600px"></div>
   			<div style="position: relative; left: 26%; margin-top: 150px;"><img src="./cola/cola2.jpg" width="1000px" height="600px"></div>
   			<div style="position: relative; left: 26%; margin-top: 150px;"><img src="./cola/cola3.jpg" width="1000px" height="600px"></div>
   			<div style="position: relative; left: 26%; margin-top: 150px;"><img src="./cola/cola4.jpg" width="1000px" height="600px"></div>
   			<div style="position: relative; left: 26%; margin-top: 150px;"><img src="./cola/cola5.jpg" width="1000px" height="600px"></div>
   			<div style="position: relative; left: 26%; margin-top: 150px;"><img src="./cola/cola6.jpg" width="1000px" height="600px"></div>
 
   			<div style="border: solid 1px; margin-top: 150px; margin-bottom: 150px; color: grey;"><hr></div>
   			<div style="position: relative; left: 49%;margin-top: 150px; margin-bottom: 100px;">
   				<a href="reservation.php"style="color: black; border:1px solid;"><h3>예약하러 가기</a></div>


   		</div>
   	</body>