<?php
session_start();
if (isset($_SESSION["userid"])) {
  $userid = $_SESSION["userid"];
} else {
  $userid = "";
}
?>
<div class ="wrap">
		<div class = "intro_bg">	
    <div id="top">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
        <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="pensionHome.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="produce_room.php">ROOM</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php">RESERVE </a></li>
                <li class="nav-item"><a class="nav-link" href="reservation_status.php">RS_STATUS</a></li>
                <li class="nav-item"><a class="nav-link" href="board_list.php">BOARD</a></li>
                <li class="nav-item"><a class="nav-link" href="notice_list.php">NOTICE</a></li>
                <li class="nav-item"><a class="nav-link" href="qna_list.php">QNA</a></li>
                <?php
                if ($userid == "admin") { ?>
                    <li class="nav-item"><a class="nav-link" href="admin.php">MNG_PG</a> </li>
                    <?php }
                if (!$userid) { ?>                
                        <li class="nav-item"><a class="nav-link" href="member_form.php">회원가입 </a> </li>
                    <?php } else {$logged = $userid . "님"; ?>
                
                <li class="nav-item"><a class="nav-link" onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY </a></li>
                <li class="nav-item"><span class="navbar-text" style="color:white;"><?= $logged ?></span> </li>
                <li class="nav-item"><a class="nav-link" href="member_modify_form.php">정보수정</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">로그아웃</a></li>
<?php }
                ?>
                <li class="nav-item"><?php if (!$userid) { ?>
                    </ul>
                        <form id="frm" name="frm" method="post" action="login.php">
                            <div class="whitefont">
                            ID:<input type="textbox" name="id" placeholder="ID">
                            PW:<input type="password" name="pass" placeholder="PW">
                            <button class="bnt1" onclick="javascript:document.frm.submit();">로그인</button>
                            </div>
                        </form>
                    </li>   
                                    
                     <?php } ?>
						
			</div>