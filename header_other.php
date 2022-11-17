<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}
?>
<head>
	<link rel="stylesheet" type="text/css" href = "./css/common.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- jQuery library -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->

	<!-- Popper JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<div class ="wrap">
		<div class = "intro_bg1">	
    <div id="top">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
    <a class="navbar-brand" href="pensionHome.php">
      <img src="./image/logo2.png" alt="Logo" style="width:40px;">
    </a>
        <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="pensionHome.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="produce_room.php">ROOM</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php">RESERVE </a></li>
                <li class="nav-item"><a class="nav-link" href="tourist.php">TOURIST</a></li>
                <li class="nav-item"><a class="nav-link" href="board_list.php">BOARD</a></li>
                <?php
                if ($userid == "admin") { ?>
                    <li class="nav-item"><a class="nav-link" href="admin.php">MNG_PG</a> </li>
                    <?php }
                if (!$userid) { ?>                
                <li class="nav-item"><a class="nav-link" href="login_form.php">LOGIN</a></li>
                        
                    <?php } else {$logged = $userid . "님"; ?>
                
                <li class="nav-item"><a class="nav-link" onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY </a></li>
                <li class="nav-item"><span class="navbar-text" style="color:white;"><?= $logged ?></span> </li>
                <li class="nav-item"><a class="nav-link" href="my_page.php">내 정보</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">로그아웃</a></li>
<?php }
                if (!$userid) { ?>
                <li class="nav-item"><a class="nav-link" href="member_form.php">회원가입 </a> </li> 
                     <?php }
                ?>
						
			</div>