<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
?>
<!doctype html>
<meta charset="utf-8">
<title>T&R 숙소 예약 홈페이지</title>
<script type="text/javascript" src="./js/login.js"></script>
<head>
	<link rel="stylesheet" type="text/css" href = "./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome_member.php">HOME</a></li>
					<li><a href="#">RESERVE</a></li>
					<li><a href="#">RESERVATION STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					<li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
					<?php
    					if(!$userid) {
					?>                
                			<li><a href="member_form.php">회원가입</a> </li>
   					 <?php
   					 }
   					 
   					 else {
              			  $logged = $userid."님";
						?>
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
							<button class="bnt1" onclick="javascript:document.frm.submit();">로그인</button></div>
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

        <div id="main_content">
            <div id="latest_bd">
                <h4>BOARD</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="latest_nt">
                <h4>NOTICE</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "", "sample");
    $sql = "select * from notice order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "공지사항 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
        </div>
</body>
</html>
