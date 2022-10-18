<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>QNA게시판</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href = "./css/sub_style.css">
<link rel="stylesheet" type="text/css" href="./css/common.css">
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
	<div id="board_box">
	    <h3 class="title">
			QNA > 내용보기
		</h3>
<?php
$num = $_GET["num"];
$page = $_GET["page"];

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from qna where num=$num";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$id = $row["id"];
$name = $row["name"];
$regist_day = $row["regist_day"];
$subject = $row["subject"];
$content = $row["content"];
$file_name = $row["file_name"];
$file_type = $row["file_type"];
$file_copied = $row["file_copied"];
$hit = $row["hit"];

$content = str_replace(" ", "&nbsp;", $content);
$content = str_replace("\n", "<br>", $content);

$new_hit = $hit + 1;
$sql = "update qna set hit=$new_hit where num=$num";
mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?= $subject ?></span>
				<span class="col2"><?= $id ?> | <?= $regist_day ?></span>
			</li>
			<li>
				<?php if ($file_name) {
      $real_name = $file_copied;
      $file_path = "./data/" . $real_name;
      $file_size = filesize($file_path);

      echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
    } ?>
				<?= $content ?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button class="btn btn-primary" style="color:white;" onclick="location.href='qna_list.php?page=<?= $page ?>'">목록</button></li>
        <li><button class="btn btn-primary" style="color:white;" onclick="location.href='qna_form.php'">글쓰기</button></li>
        <?php if ($userid == $id) { ?>
        <li><button class="btn btn-primary" style="color:white;" onclick="location.href='qna_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button></li>
        <li><button class="btn btn-secondary" style="color:white;" onclick="location.href='qna_delete.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button></li>
        <?php } ?>

		</ul>
	</div> <!-- board_box -->
</section> 
</body>
</html>
