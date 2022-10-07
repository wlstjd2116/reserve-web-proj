<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
      if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>QNA게시판</title>
<link rel="stylesheet" type="text/css" href = "./css/sub_style2.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script type="text/javascript" src="./js/login.js"></script>
<script>
  function check_input() {
      if (!document.qna_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.qna_form.subject.focus();
          return;
      }
      if (!document.qna_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.qna_form.content.focus();
          return;
      }
      document.qna_form.submit();
   }
</script>
</head>
<body> 
<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="reservation_status.php">RS_STATUS</a></li>
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
<section>

   	<div id="board_box">
	    <h3 id="board_title">
	    		QNA > 글 쓰기
		</h3>
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "root", "", "test");
	$sql = "select * from qna where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];
?>
	    <form  name="qna_form" method="post" action="qna_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$name?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><?=$file_name?></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='qna_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 

</body>
</html>
