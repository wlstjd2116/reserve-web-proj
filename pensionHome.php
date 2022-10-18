<!doctype html>
<meta charset="utf-8">
<title>T&R 숙소 예약 홈페이지</title>
<script type="text/javascript" src="./js/login.js"></script>
<head>
	<link rel="stylesheet" type="text/css" href = "./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
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
	<?php include "./header.php"; ?>
			<div class = "intro_text">
				<h1><img src="image/logo.png" width="400px" height="300px"></iframe></h1>
				<div class="moongoo">프라이빗한 힐링, T&R에서</h4>
			</div>
		</div>
		<!-- intro end -->

		<div id="main_content">
            <div id="latest_bd">
                <h4 style="color:white;">BOARD</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from board order by num desc limit 5";
$result = mysqli_query($con, $sql);

if (!$result) {
  echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
} else {
  while ($row = mysqli_fetch_array($result)) {
    $regist_day = substr($row["regist_day"], 0, 10); ?>
                <li>
                    <span style="color:white;"><?= $row["subject"] ?></span>
                    <span style="color:white;"><?= $row["id"] ?></span>
                    <span style="color:white;"><?= $regist_day ?></span>
                </li>
<?php
  }
}
?>
            </div>
            <div id="latest_nt">
                <h4 style="color:white;">NOTICE</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from notice order by num desc limit 5";
$result = mysqli_query($con, $sql);

if (!$result) {
  echo "공지사항 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
} else {
  while ($row = mysqli_fetch_array($result)) {
    $regist_day = substr($row["regist_day"], 0, 10); ?>
                <li>
                    <span style="color:white;"><?= $row["subject"] ?></span>
                    <span style="color:white;"><?= $row["name"] ?></span>
                    <span style="color:white;"><?= $regist_day ?></span>
                </li>
<?php
  }
}
?>
            </div>
        </div>
        <div class = "amount">
            <li>
                <div>
                    <div class="contents1"> <a href="room01.php">자연룸</a></div>
                    <div class="result">자연과 함께하는 자연룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1" ><a href="room02.php">마운틴룸</a></div>
                    <div class="result">산과 가까이, 마운틴룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1"> <a href="room03.php">바다룸</a></div>
                    <div class="result">바다향 느낄 수 있는 바다룸</div>
                </div>
            </li>
            <li>
                <div>
                    <div class="contents1"> <a href="room04.php">냇가룸</a></div>
                    <div class="result">계곡과 함께 즐기는 냇가룸</div>
                </div>
            </li>
    </div>
</body>
</html>
