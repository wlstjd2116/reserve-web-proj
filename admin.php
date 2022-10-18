<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>관리자페이지</title>
<link rel="stylesheet" type="text/css" href="./css/admin.css">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" href="./css/common.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 
<section>
<?php include "./header_other.php"; ?>
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

while ($row = mysqli_fetch_array($result)) {

  $num = $row["num"];
  $id = $row["id"];
  $name = $row["name"];
  $regist_day = $row["regist_day"];
  ?>
			
		<li>
		<form method="post" action="admin_member_update.php?num=<?= $num ?>">
			<span class="col1"style="color: white; font-weight: bolder;"><?= $number ?></span>
			<span class="col2"style="color: white; font-weight: bolder;"><?= $id ?></a></span>
			<span class="col3"style="color: white; font-weight: bolder;"><?= $name ?></span>
			<span class="col6"style="color: white; font-weight: bolder;"><?= $regist_day ?></span>
			<span class="col7"style="color: white; font-weight: bolder;"><button type="submit"style="color: black; font-weight: bolder;">수정</button></span>
			<span class="col8"style="color: black; font-weight: bolder;"><button type="button" onclick="location.href='admin_member_delete.php?num=<?= $num ?>'"style="color: black; font-weight: bolder;">삭제</button></span>
		</form>
		</li>	
			
<?php $number--;
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
			<span class="col3"style="color: black; font-weight: bolder;">아이디</span>
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

while ($row = mysqli_fetch_array($result)) {

  $num = $row["num"];
  $id = $row["id"];
  $name = $row["name"];
  $subject = $row["subject"];
  $file_name = $row["file_name"];
  $regist_day = $row["regist_day"];
  $regist_day = substr($regist_day, 0, 10);
  ?>
		<li>
			<span class="col1"><input type="checkbox" style="color: black; font-weight: bolder;" name="item[]" value="<?= $num ?>"></span>
			<span class="col2"style="color: white; font-weight: bolder;"><?= $name ?></span>
			<span class="col3"style="color: white; font-weight: bolder;"><?= $id ?></span>
			<span class="col4"style="color: white; font-weight: bolder;"><?= $subject ?></span>
			<span class="col5"style="color: white; font-weight: bolder;"><?= $file_name ?></span>
			<span class="col6"style="color: white; font-weight: bolder;"><?= $regist_day ?></span>
		</li>	
<?php $number--;
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
