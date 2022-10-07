<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>		
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>관리자페이지</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">


</head>
<body> 
<section>
		<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="reservation_status.php">RS_STATUS</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					<?php
    					if($userid == "admin"){
						?>

							<li><a href="admin.php">MNG_PG</a> </li>
							<?php
					}
    					if(!$userid) {
					?>                
                			<li><a href="member_form.php">회원가입</a> </li>
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
							<button class="bnt1" onclick="javascript:document.frm.submit();">로그인</button></div>
						</form>
					</li>	
					                
   					 <?php
   					 }
   					 ?>
						
			</div>
		</ul>
   	<div id="admin_box" style="color: #fff">
	    <h3 id="member_title" style="color: #fff; font-weight: bolder;">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1"style="color: black; font-weight: bolder;">번호</span>
					<span class="col2"style="color: black; font-weight: bolder;">아이디</span>
					<span class="col3"style="color: black; font-weight: bolder;">이름</span>
					<span class="col6"style="color: black; font-weight: bolder;">가입일</span>
					<span class="col7"style="color: black; font-weight: bolder;">수정</span>
					<span class="col8"style="color: black; font-weight: bolder;">삭제</span>
				</li>
<?php
	$con = mysqli_connect("localhost", "root", "", "test");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
      $regist_day  = $row["regist_day"];
?>
			
		<li>
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"style="color: white; font-weight: bolder;"><?=$number?></span>
			<span class="col2"style="color: white; font-weight: bolder;"><?=$id?></a></span>
			<span class="col3"style="color: white; font-weight: bolder;"><?=$name?></span>
			<span class="col6"style="color: white; font-weight: bolder;"><?=$regist_day?></span>
			<span class="col7"style="color: white; font-weight: bolder;"><button type="submit"style="color: black; font-weight: bolder;">수정</button></span>
			<span class="col8"style="color: black; font-weight: bolder;"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'"style="color: black; font-weight: bolder;">삭제</button></span>
		</form>
		</li>	
			
<?php
   	   $number--;
   }
?>
	    </ul>
	    <h3 id="member_title"style="color: white; font-weight: bolder;">
	    	관리자 모드 > 게시판 관리
		</h3>
	    <ul id="board_list"style="color: black; font-weight: bolder;"style="color: black; font-weight: bolder;">
		<li class="title">
			<span class="col1"style="color: black; font-weight: bolder;">선택</span>
			<span class="col2"style="color: black; font-weight: bolder;">번호</span>
			<span class="col3"style="color: black; font-weight: bolder;">이름</span>
			<span class="col4"style="color: black; font-weight: bolder;">제목</span>
			<span class="col5"style="color: black; font-weight: bolder;">첨부파일명</span>
			<span class="col6"style="color: black; font-weight: bolder;">작성일</span>
		</li>
		<form method="post" action="admin_board_delete.php">
<?php
	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글의 수

	$number = $total_record;

   while ($row = mysqli_fetch_array($result))
   {
      $num         = $row["num"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
	  $file_name   = $row["file_name"];
      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)
?>
		<li>
			<span class="col1"><input type="checkbox" style="color: black; font-weight: bolder;" name="item[]" value="<?=$num?>"></span>
			<span class="col2"style="color: white; font-weight: bolder;"><?=$number?></span>
			<span class="col3"style="color: white; font-weight: bolder;"><?=$name?></span>
			<span class="col4"style="color: white; font-weight: bolder;"><?=$subject?></span>
			<span class="col5"style="color: white; font-weight: bolder;"><?=$file_name?></span>
			<span class="col6"style="color: white; font-weight: bolder;"><?=$regist_day?></span>
		</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>
				<button type="submit" style="color: black; font-weight: bolder;">선택된 글 삭제</button>
			</form>
	    </ul>
	</div> <!-- admin_box -->
</section> 
</body>
</html>
