<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원가입 페이지</title>
<!--<link rel="stylesheet" type="text/css" href = "./css/common.css">-->
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

<style>
  #inputWrap{
  	text-align:center;
  	width : 20%;
  	height : auto;
  	margin : 0 auto;
  	margin-top : 5%;
  }
</style>
</head>
<body>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<meta charset="UTF-8">
<title>회원가입</title>
<body>
<?php include "./header_other.php"; ?>
<script>
	var Dflag = false;
	var Pflag = false; 

	 function validCheck(){
		pwd = iform.pwd.value;
		chk = iform.checkPwd.value;
		if(pwd != chk){
			document.getElementById("warning").style.color="red";
			document.getElementById("warning").innerText=" * Does not match for password";
			Pflag = false;
		}
		else{
			document.getElementById("warning").style.color="blue";
			document.getElementById("warning").innerText=" * Valid!";
			Pflag = true;
		}
		console.log(pwd, chk);
	} 
	 
	function dupCheck(){
		id = iform.id.value;
		window.open("member_check_id.php?id="+id,"checkPopup","width=350, height=50, top=400, left= 780");
		
		Dflag = true;
	}
	
	function nullCheck(){
		if(Dflag == false){
			alert("아이디 중복체크를 진행해주세요");
			return;
		}
		if(Pflag == false){
			alert("비밀번호와 비밀번호 확인란을 확인해주세요");
			return;
		}
		if (Dflag == true && Pflag == true ){
			console.log(Dflag, Pflag);
			document.iform.submit();
		}else {return;} 
	}
</script>		
</head>
<body>
<div id="inputWrap">
	<font size="8" style=""><b>M</b>ember <br><b>I</b>nput <br> <b>P</b>age</font> 
		<br><br><br>
<form name="iform" method="post" action="./member_insert.php">
  
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
  
  <br>
  <input type="button" class="btn btn-primary" onClick="nullCheck();" value="Submit">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="reset" class="btn btn-secondary">Reset</button>
</form>
</div>

<?php include "./footer.php"; ?></body>
</html>

