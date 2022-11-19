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
      if (!document.myform.subject.value)
      {
          alert("제목을 입력하세요!");
          document.myform.subject.focus();
          return;
      }
      if (!document.myform.content.value)
      {
          alert("내용을 입력하세요!");    
          document.myform.content.focus();
          return;
      }
      document.myform.submit();
   }
$(document).ready(function (){
	$('.starRev span').click(function(){
  $(this).parent().children('span').removeClass('on');
  $(this).addClass('on').prevAll('span').addClass('on');
  return false;
});
});
</script>
</head>
<body> 
<?php include "./header_other.php"; ?>
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 리뷰 글 쓰기
		</h3>
	    <form  name="myform" method="post" id="myform" action="board_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">방 이름 : </span>
					<span class="col2">
						<select name="r_name">
							<option value="네이처">네이처</option>
							<option value="마운틴">마운틴</option>
							<option value="오션">오션</option>
							<option value="베르데">베르데</option>
							<option value="허니블루">허니블루</option>
							<option value="아마빌레">아마빌레</option>
						</select>
					</span>
				</li>		
        <li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input type="text" name="subject" class="form-control">
	    		</li>
				<li>
	    			<span class="col1">별점 : </span>
					<fieldset>
						<input type="radio" name="rating" value="5" id="rate1"><label for="rate1">⭐</label>
						<input type="radio" name="rating" value="4" id="rate2"><label for="rate2">⭐</label>
						<input type="radio" name="rating" value="3" id="rate3"><label for="rate3">⭐</label>
						<input type="radio" name="rating" value="2" id="rate4"><label for="rate4">⭐</label>
						<input type="radio" name="rating" value="1" id="rate5"><label for="rate5">⭐</label>
					</fieldset>
					
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
<?php include "./footer.php"; ?></body>
</html>
