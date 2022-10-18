<?php
$id = $_POST["id"];
$pass = $_POST["pwd"];
$name = $_POST["name"];
$email = $_POST["email"];
$regist_day = date("Y-m-d (H:i)"); // 현재의 '년-월-일-시-분'을 저장

$con = mysqli_connect("localhost", "root", "", "test");

$sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

mysqli_query($con, $sql); // $sql 에 저장된 명령 실행
mysqli_close($con);

echo "
	      <script>
	          location.href = 'pensionHome.php';
	      </script>
	  ";
?>
