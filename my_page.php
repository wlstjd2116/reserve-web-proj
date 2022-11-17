<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>내 정보</title>
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href = "./css/common.css">	<link rel="stylesheet" type="text/css" href = "./css/style.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.3,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/locales-all.min.js,npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="jquery.bpopup2.min.js" type="text/javascript"></script>
</head>

<body>
<?php include "./header_other.php"; ?>
<?php
$sql = "select * 
from tb_house_reservation A left join tb_house B on (A.house_id = B.house_id) 
where A.user_id = '$userid';";
$con = mysqli_connect("localhost", "root", "", "test");
$result = mysqli_query($con, $sql);
?>
<div class="my-wrap">
 <div class="title">내 정보</div>
 <div class="side-body"> 
    <div class="left-side">
    <ul>
        <li><a href="./my_page.php">예약 내역</a></li>
        <li><a href="./member_modify_form.php">정보 수정</a></li>
    </ul>
    </div>
 <div class="right-side">   
    <dd>예약 내역<dd>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
          <div class="card"> 
            <!-- <?= $res["house_name"] ?> -->
            <?php if (isset($res["house_id"])) { ?> 
                <img src="./room/view_room/0<?= $res["house_id"] ?>.jpg" width=100%; height=160px;>
                <pps><?= $res["house_name"] ?></pps>
                <pps2><?= $res["rs_date"] ?></pps2>
                <?php } ?>
          </div>
          <?php } ?> 
 </div>
</div><!-- side-body end -->

</div>
</body>
</html>







