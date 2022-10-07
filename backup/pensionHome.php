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
				<h1><img src="image/logo.png" width="400px" height="300px"></iframe></h1>
				<div class="moongoo">프라이빗한 힐링, T&R에서</h4>
			</div>
		</div>
		<!-- intro end -->

		<div class = "amount">
			<li>
				<div>
					<div class="contents1">ㅇㅇ</div>
					<div class="result">와사비간장</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">그래그래</div>
					<div class="result">대마왕</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">너의새끼오징어</div>
					<div class="result">내가붙잡고있다</div>
				</div>
			</li>
			<li>
				<div>
					<div class="contents1">ㅈㅈ거을겅벗어</div>
					<div class="result">적을 게 없d다고</div>
				</div>
			</li>
	</div>

	<table class = "table_center">
		<tr>
			<td><image src="image/01.jpg" width="180" height="180"></td>
			<td><image src="image/02.jpg" width="180" height="180"></td>
			<td><image src="image/03.jpg" width="180" height="180"></td>
			<td><image src="image/04.jpg" width="180" height="180"></td>
		</tr>
		<tr class = "table_text">
			<td><h5>영덕대덕펜션<br/>평점 4.5/5</td>
			<td><h5>영덕향기펜션<br/>평점 4.3/5</td>
			<td><h5>영덕영덕펜션<br/>평점 4.9/5</td>
			<td><h5>영덕대게펜션<br/>평점 4.5/5</td>
		</tr>

	</table>
	<table class = "table_center">
		<tr>
			<td><image src="image/08.jpg" width="180" height="180"></td>
			<td><image src="image/07.jpg" width="180" height="180"></td>
			<td><image src="image/06.jpg" width="180" height="180"></td>
			<td><image src="image/05.jpg" width="180" height="180"></td>
		</tr>
		<tr class = "table_text">
			<td><h5>영덕금산펜션<br/>평점 3.8/5</td>
			<td><h5>영덕대구펜션<br/>평점 4.2/5</td>
			<td><h5>영덕진성펜션<br/>평점 2.1/5</td>
			<td><h5>영덕주아펜션<br/>평점 5.0/5</td>
		</tr>

	</table>
</body>
</html>
