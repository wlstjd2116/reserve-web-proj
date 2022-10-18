<?php
error_reporting(0);
ini_set("display_errors", 0);

$sql = "select count(*) as cnt from notice";
$con = mysqli_connect("localhost", "root", "", "test");
$rs = mysqli_query($con, $sql);
$cnt = mysqli_fetch_array($rs);

if ($cnt["cnt"] > 0) {
  $total = $cnt["cnt"];
}

if (empty($skey)) {
  $skey = $_REQUEST["keyfield"];
  $sval = $_REQUEST["keyword"];
} else {
  $skey = "";
  $sval = "";
}

$sqry = "";
$Stotal = 0;
if ($skey == "" || $sval == "" || $skey == null || $sval == null) {
  $skey = "";
  $sval = "";
  $sqry = "";
} else {
  $sqry = "where " . $skey . " like '%" . $sval . "%'";
}

$returnPage = "keyfield = " . $skey . "&keyword = " . $sval;
$sSql = " select count(*) as scnt from notice " . $sqry;
$rs = mysqli_query($con, $sSql);
$result = mysqli_fetch_array($rs);

if ($result["scnt"] > 0) {
  $Stotal = $result["scnt"];
  $Gtotal = $result["scnt"];
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>공지사항</title>
<script type="text/javascript" src="./js/login.js"></script>
<head> 
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href = "./css/sub_style.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
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
<?php include "./header_other.php"; ?>
    
<section>

  <div id = "list_box">
  <div class="container">
  <h2 style="margin-top:70px; font-size:3em" ><b>N</b>otice</h2>
  <p>사용자에게 제공될 공지사항 게시판입니다. </p>   
  <form method="post" action="notice_list.php" style="float:right">
	  	<div class="input-group mt-3 mb-3" >
		  <div class="input-group-prepend">
		    <select class="btn btn-outline-secondary dropdown-toggle" name="keyfield" data-toggle="dropdown">
		      <option class="dropdown-item" value="name">Search Name</option>
		      <option class="dropdown-item" value="subject">Search Title</option>
		      <option class="dropdown-item" value="content">Search Content</option>
		    </select>
		  </div>
		  <input type="text" class="form-control" name="keyword" placeholder="search">
		  <div class="input-group-append">
			 <button class="btn btn-secondary" type="submit" style="height:38px">Go</button>
		  </div>
		</div>
		</form>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Writer</th>
        <th>File</th>
        <th>Date</th>
        <th>View</th>
      </tr>
    </thead>
<?php
if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}

$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select * from notice " . $sqry . " order by num desc";
$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result); // 전체 글 수

$scale = 10;

// 전체 페이지 수($total_page) 계산
if ($total_record % $scale == 0) {
  $total_page = floor($total_record / $scale);
} else {
  $total_page = floor($total_record / $scale) + 1;
}

// 표시할 페이지($page)에 따라 $start 계산
$start = ($page - 1) * $scale;

$number = $total_record - $start;

for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {

  mysqli_data_seek($result, $i);
  // 가져올 레코드로 위치(포인터) 이동
  $row = mysqli_fetch_array($result);
  // 하나의 레코드 가져오기
  $num = $row["num"];
  $id = $row["id"];
  $name = $row["name"];
  $subject = $row["subject"];
  $regist_day = $row["regist_day"];
  $hit = $row["hit"];
  if ($row["file_name"]) {
    $file_image = "<img src='./img/file.gif'>";
  } else {
    $file_image = " ";
  }
  ?>
  <tbody>
      <tr>
        <td><?= $number ?></td>
        <td ><a href="notice_view.php?num=<?= $num ?>&page=<?= $page ?>" style="color:black;"><?= $subject ?></a></td>
        <td><?= $name ?></td>
        <td><?= $file_image ?></td>
        <td><?= $regist_day ?></td>
        <td><?= $hit ?></td>
</div>
<?php $number--;
}

mysqli_close($con);
?>
    </tbody>
  </table>

  
			<ul id="page_num"> 	
<?php
if ($total_page >= 2 && $page >= 2) {
  $new_page = $page - 1;
  echo "
  <li><a href='notice_list.php?page=$new_page'>◀ 이전</a> </li>";
} else {
  echo "<li>&nbsp;</li>";
}

// 게시판 목록 하단에 페이지 링크 번호 출력
for ($i = 1; $i <= $total_page; $i++) {
  if ($page == $i) {
    // 현재 페이지 번호 링크 안함
    echo "<li><b> $i </b></li>";
  } else {
    echo "<li><a href='notice_list.php?page=$i'> $i </a><li>";
  }
}
if ($total_page >= 2 && $page != $total_page) {
  $new_page = $page + 1;
  echo "<li> <a href='notice_list.php?page=$new_page'>다음 ▶</a> </li>";
} else {
  echo "<li>&nbsp;</li>";
}
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li>
<?php if ($userid == "admin") { ?>
					<button onclick="location.href='notice_form.php'" class="btn btn-primary" style="color:white; float:right;">글쓰기</button>
<?php } else { ?>
					<a href="javascript:alert('관리자만 이용할 수 있습니다!')"><button type="button" class="btn btn-primary" style="float:right;" >글쓰기</button></a>
<?php } ?>
				</li>
			</ul>
      </div>
	</div> <!-- board_box -->
</section> 
			
		<!-- intro end -->


</body>
</html>
