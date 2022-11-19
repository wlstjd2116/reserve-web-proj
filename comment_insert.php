<?php
$contents = $_REQUEST["contents"];
$bnum = $_POST["bnum"];
$btype = $_POST["btype"];
$userid = $_POST["userid"];
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "insert into comment(u_id, contents, b_num, time, b_type) ";
$sql .= "values('$userid', '$contents',$bnum, NOW(), '$btype')";
mysqli_query($con, $sql); // $sql 에 저장된 명령 실행

echo "
<script>
location.href ='board_view.php';</script>";
?>
