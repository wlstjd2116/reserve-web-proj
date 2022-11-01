<?php
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
} else {
  $username = "";
} ?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>공지사항</title>
<link rel="stylesheet" type="text/css" href = "./css/sub_style2.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script type="text/javascript" src="./js/login.js"></script>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function check_input() {
      if (!document.notice_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.notice_form.subject.focus();
          return;
      }
      if (!document.notice_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.notice_form.content.focus();
          return;
      }
      document.notice_form.submit( );
   }
</script>
<style>
  * {
    color:black;
  }
</style>
</head>
<body> 
<?php include "./header_other.php"; ?>
<section>

   	<div id="board_box">
	    <h3 id="board_title">
	    		공지사항 > 글 수정하기
		</h3>
<?php
$num = $_GET["num"];
$page = $_GET["page"];

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from notice where num=$num";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$name = $row["name"];
$subject = $row["subject"];
$content = $row["content"];
$file_name = $row["file_name"];
?>
	    <form  name="notice_form" method="post" action="notice_modify.php?num=<?= $num ?>&page=<?= $page ?>" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?= $name ?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input type="text" name="subject" class="form-control" value="<?= $subject ?>">
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
                    <span class="col2"><textarea name="content" class="form-control" 
                    style="width:500px; height:135px; resize:none; margin: 0 auto;"><?= $content ?></textarea></span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><?= $file_name ?></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" class="btn btn-success" style="color:white;" onclick="check_input()">수정하기</button></li>
				<li><button type="button" class="btn btn-secondary" style="color:white;" onclick="location.href='notice_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<?php include "./footer.php"; ?></body>
</html>
