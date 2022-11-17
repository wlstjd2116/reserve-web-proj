<!doctype html>
<meta charset="utf-8">
<title>T&R 로그인</title>
<script type="text/javascript" src="./js/login.js"></script>
<head>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/login_form1.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style>
    @font-face {
  font-family: "AppleSDGothicNeoEB";
  src: url("./font/AppleSDGothicNeoEB.ttf");
}
</style>
</head>
<body>
	<?php include "./header.php"; ?>
		<div class = "login_wrap">
			<div class = "login_space">
			<div class="login_form_wrap">  
			<h2 style="font-family: 'AppleSDGothicNeoEB';"><font color="BLUE" size="25px;"><b>T&R HOUSE</b></font><BR>Member<strong>로그인</strong></h2> 
			<form id="frm" name="frm" method="post" action="login.php" class="form_login">
				<fieldset>
				<div class="login_inputbox">
					<ul>
					<li>
						<label for="USER_ID1"><img src="./image/login_id_ico2.png" alt="아이디 아이콘"></label>
						<input type="text" id="userId" name="id" title="아이디" placeholder="아이디(ID)" value="">
					</li>
					<li>
						<label for="USER_PW1"><img src="./image/login_pw_ico2.png" alt="패스워드 아이콘"></label>
						<input type="password" id="pwd" name="pass" title="패스워드" placeholder="패스워드(Pass Word)" value="" onkeypress="if(event.keyCode==13) {chkLogIn();}">
					</li>
					</ul> 
				</div>  
				<a href="#n" class="login_btn" onclick="javascript:document.frm.submit();"><span>로그인</span></a>
				</fieldset>                   
			</form>
			</div>
			</div>
		</div> <!-- login_wrap end -->
<?php include "./footer.php"; ?>
</body>
</html>
