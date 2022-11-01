<!DOCTYPE html>
<meta charset="utf-8">
<title>정보수정</title>
<script>function check_input()
   {
      if (!document.member_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value) {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form() {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
      document.member_form.id.focus();
      return;
   }</script>
<head>
	<link rel="stylesheet" type="text/css" href = "./css/member.css">
	<link rel="stylesheet" type="text/css" href = "./css/style.css">
	<link rel="stylesheet" type="text/css" href = "./css/common.css">
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
<?php
include "./header_other.php";
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from members where id='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$pass = $row["pass"];
$name = $row["name"];

$email = explode("@", $row["email"]);
$email1 = $email[0];
$email2 = $email[1];

mysqli_close($con);
?>

			<div class = "empty" style="margin-top:100px;">
        		<img src="./image/logo.png" width="450px" height="350px">
        </div>
        <section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<?= $userid ?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?= $pass ?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm" value="<?= $pass ?>">
				        </div>                 
			       	</div>

			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?= $name ?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?= $email1 ?>">@<input 
							       type="text" name="email2" value="<?= $email2 ?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/save2.png" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.png"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
</section>
<?php include "./footer.php"; ?>

<div id="inputWrap">
	<font size="8" style=""><b>M</b>ember <br><b>I</b>nput <br> <b>P</b>age</font> 
		<br><br><br>
		<form  name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>">
  
  <div class="form-group">
    <label for="id" style="float:left;"><font style="color:red;">*</font> ID:</label>
    <input type="button" class="btn btn-secondary" style="float:right; margin-bottom:5px;" onClick="dupCheck();" value="ID Check">
    <input type="id" class="form-control" placeholder="Enter ID" name="id" required>
  </div>
  
  <div class="form-group">
    <label for="pwd" style="float:left;"><font style="color:red;">*</font> Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" name="pwd" required  onkeyup="validCheck();">
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="checkPwd" style="float:left;"><font style="clr:red;">*</font> Pwd Check:</label>
    <input type="password" class="form-control" placeholder="Enter re-password" name="checkPwd" require
    onkeyup="validCheck();">
    <span id="warning" style="color:red;"></span>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="name" style="float:left;"><font style="color:red;">*</font> name:</label>
    <input type="text" class="form-control" placeholder="Enter name" name="name" required>
  </div>

  <div class="form-group">
    <label for="email" style="float:left;"><font style="color:red;">*</font> email:</label>
    <input type="text" class="form-control" placeholder="Enter email" name="email" required>
  </div>
  
  <br>
  <input type="button" class="btn btn-primary" onClick="nullCheck();" value="Submit">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="reset" class="btn btn-secondary">Reset</button>
</form>
</div>
<?php include "./footer.php"; ?></body>
</body>
</html>

