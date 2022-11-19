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
 <div class="member-title">내 정보</div>
 <div class="side-body"> 
    <div class="left-side">
    <ul>
        <li><a href="./my_page.php">예약 내역</a></li>
        <li><a href="./member_modify_form.php">정보 수정</a></li>
        <li style="margin-top:50px;"><a href="./member_delete_form.php" style="color:black;">회원 탈퇴</a></li>
    </ul>
    </div>
 <div class="right-side">   
    <dd>회원 탈퇴<dd>
        <div class="delete-card">
            <br>
            한 번 탈퇴하시면 복구가 불가능합니다. 정말 탈퇴하시겠습니까?
            <br>
            <pp>네. 탈퇴하겠습니다.</pp><input type="checkbox" name="ck" id="ck">
            <br>
            <button class="btn-delete">탈퇴</button>
        </div>
 </div>
</div><!-- side-body end -->

</div>
<script>
    let ck = false;
    $('#ck').click(function() {
        if($('#ck').is(':checked')){
            ck = true;
        }
        else {
            ck = false;
        }
        console.log(ck);
    })
    
    console.log(ck);
    $('.btn-delete').click(function(){
        if (ck == true){
            location.href="member_delete.php";
        }
        else {
            alert("체크박스 체크 후 다시 탈퇴를 신청해주세요.");
            return;
        }
        
    });
</script>
</body>
</html>







