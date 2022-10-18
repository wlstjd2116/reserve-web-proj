<?php
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
} else {
  $username = "";
} ?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="./js/login.js"></script>
<head> 
<meta charset="utf-8">
<title>T&R게시판</title>
<link rel="stylesheet" type="text/css" href = "./css/sub_style.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/common.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<?php include "./header_other.php"; ?>
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
	    <form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">아이디 : </span>
					<span class="col2"><?= $userid ?></span>
				</li>		
        <li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input type="text" name="subject" class="form-control">
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
                    <span class="col2"><textarea name="content" class="form-control" 
                    style="width:500px; height:135px; resize:none; margin: 0 auto;"></textarea></span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button class="btn btn-primary" style="color:white;" type="button" onclick="check_input()">완료</button></li>
				<li><button class="btn btn-primary" style="color:white;" type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
</body>
</html>
