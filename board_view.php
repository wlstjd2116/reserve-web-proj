<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>T&A게시판</title>
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href = "./css/sub_style.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
html {
	background-color: #ebeef1;
}
</style>
</head>
<body> 
<section>

<?php include "./header_other.php"; ?>
<div class="bd_wrap">
<div class="view-width2">
<div class="left-container2">
  <div class="lc-title">
    Board
  </div>
  
  <ul>
    <li><a href="./board_list.php"style="color : black;" > Review </a></li>
    <li><a href="./notice_list.php"> Notice </a></li>
    <li><a href="./qna_list.php" > QnA </a></li>
  </ul>
  

  </div>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
$num = $_GET["num"];
$page = $_GET["page"];

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from board where num=$num";
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
$bnum = $row["num"];
$content = str_replace(" ", "&nbsp;", $content);
$content = str_replace("\n", "<br>", $content);
$rating = $row["rating"];
$r_name = $row["r_name"];
$new_hit = $hit + 1;
$sql = "update board set hit=$new_hit where num=$num";
mysqli_query($con, $sql);

$sql_reply = "select * from comment where b_type='board' and b_num = $bnum";
$result_reply = mysqli_query($con, $sql_reply);
$rated = "";
for ($j = 0; $j < $rating; $j++) {
  $rated = $rated . "⭐";
}
?>		
<script>
$( document ).ready(function() {
    console.log( "ready!" );
	$('.btn-add-rep').click(function() {
		var contents = $('.rep_contents').val();
		var bnum = <?= $bnum ?>;
		var dataString = 'contents='+contents+'&bnum='+bnum+'&btype=board'+'&userid='+'<?= $userid ?>'; 
		console.log(dataString);

		$.ajax({
			type:'POST',
			data : dataString,
			url : './comment_insert.php',
			success:function(data) {
				location.href="board_view.php?num="+bnum+"&page=1";
			}
		});
	});
});

var currentPosition = parseInt($(".left-container2").css("top"));
console.log(currentPosition)
  $(window).scroll(function() {
    var position = $(window).scrollTop(); 
    $(".left-container2").stop().animate({"top":position+currentPosition+"px"},800);
  });
</script>
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b>[<?= $r_name ?>] <?= $subject ?></span>
				<span class="col2"><?= $id ?> | <?= $regist_day ?></span>
			</li>
			<li>
				<?php if ($file_name) {
      $real_name = $file_copied;
      $file_path = "./data/" . $real_name;
      $file_size = filesize($file_path);

      echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
    } ?><span class="star-box">
		<b>별점 : </b><?= $rated ?>
</span><div class="rv-content"><?= $content ?></div>
				
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button  class="btn btn-primary" style="color:white;" onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button></li>
				<li><button  class="btn btn-primary" style="color:white;" onclick="location.href='board_form.php'">글쓰기</button></li>
        <?php if ($userid == $id) { ?>
          <li><button  class="btn btn-primary" style="color:white;" onclick="location.href='board_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button></li>
				<li><button  class="btn btn-secondary" style="color:white;" onclick="location.href='board_delete.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button></li>
          <?php } ?>

		</ul>
		<hr>
		<div class="reply">
			<div class="rep-title">댓글</div>
			<div class="re-part">
			<input type="text" class="rep_contents" name="content">
			  <button class="btn-add-rep" id="addrp" name="addrp" value="AddReply">작성</button>
			</div>
			  
				<?php while ($row1 = mysqli_fetch_array($result_reply)) {
      if ($row1["u_id"] != "") {

        $writer = $row1["u_id"];
        $contents = $row1["contents"];
        $time = $row1["time"];
        ?>
		<div class="re-part2">
		<span class="rep-writer"><b><?= $writer ?></b></span> 
		<span class="rep-time">&nbsp;&nbsp;|&nbsp;&nbsp;<?= $time ?> </span>
		</div>
		<br>
		<font size="4"><?= $contents ?></font>
		<hr>		
	<?php
      }
    } ?>
		</div>
	</div> <!-- board_box -->
</div>
<div class = "ft_wrap3">
    <div class ="center">
        <span>상호명 : T&R House, with Lee Jae Seok</span>
        <span>대표자 : 황진성</span>
        <span>프로젝트명 : 숙소 예약 홈페이지</span><br>
        <span>국민 940302-00-106374</span>
        <span>황진성 010-3798-4427</span>
        <span>경북 경주시 경주로 80</span>
        <span> Design by JinSeong</span>
    </div>
</div>
	</div><!-- wrap end -->
</section> 

</body>


</html>
