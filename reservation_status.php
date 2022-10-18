<?php
$con = mysqli_connect("localhost", "root", "", "test");
$sql = "select A.house_id,  A.house_name, 
   A.house_address, A.contents, count(B.rs_id) as rsCount, B.rs_year, B.rs_month, B.rs_day
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_id asc;";
$resultHouse = mysqli_query($con, $sql);
$rgsql = "select user_id, house_id,rs_year, rs_month, rs_day from tb_house_reservation order by house_id asc;";
$result = mysqli_query($con, $rgsql);
?>
<!doctype html>
<meta charset="utf-8">
<title>T&R 숙소 예약 홈페이지</title>
		<link rel="stylesheet" type="text/css" href = "./css/style.css">
		
<head>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/common.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body><?php include "./header_other.php"; ?>
			
		<!-- intro end -->
			<div style="width:1200px; margin:0px auto; background-color:rgba(0, 0, 0, 0.5);margin-top:30px;padding: 30px 30px; border-radius: 30px;">
		<table style="width:100%">
			<tr style="height:33px; background-color:rgba(0, 0, 0,0.4); color:white; text-align:center;">
				<th>
					사진
				</th>
				<th>
					No.
				</th>
				<th>
					펜션 이름
				</th>
				<th>
					주소
				</th>
				<th>
					설명
				</th>
				<th>
					예약일자
				</th>
				<th>
					예약자명 
				</th>
			</tr>
			 
			<?php
   $idx = 1;
   while ($row = mysqli_fetch_array($resultHouse)) {

     $isReservation = false;
     if ($row["rsCount"] > 0) {
       $isReservation = true;
     }
     ?>
						<tr style="height:33px; text-align:center" >
							<td>
								<img src="./image/0<?= $idx ?>.jpg" width="300" height="200"/>
							</td>
							<td>
								<div style="color: white;"><?= $row["house_id"] ?></div>
							</td>
							<td>
								<div style="color:white;"><?= $row["house_name"] ?></div>
							</td>
							<td>
								<div style="color:white;"><?= $row["house_address"] ?></div>
							</td>
							<td>
								<div style="color:white;"><?= $row["contents"] ?></div>
							</td>
							<td>
								<?php if ($isReservation) {
          $j = 0;
          mysqli_data_seek($result, $j);
          while ($row1 = mysqli_fetch_array($result)) {
            if ($row1["house_id"] == $row["house_id"]) { ?>
							<div style="color: yellow;"><?= $row1["rs_year"] ?>년 <?= $row1["rs_month"] ?>월 <?= $row1["rs_day"] ?>일</div>	
										<?php }
          }
        } else {
           ?>
							<div style="color: white">예약되지않음</div>
										<?php
        } ?>
							</td>
							<td>
								<?php
        if ($isReservation) {
          $j = 0;
          mysqli_data_seek($result, $j);
          while ($row1 = mysqli_fetch_array($result)) {
            if ($row1["house_id"] == $row["house_id"]) { ?>
											<div style="color: yellow;"><?= $row1["user_id"] ?></div>
										<?php }
          }
        } else {
           ?>
											<div style="color: white"></div>
										<?php
        }
        $idx++;
        ?>
							</td>
						</tr>
						<tr style="height:0px; text-align:center">
							<td colspan=5 style="border-bottom:1px solid #dddddd"></td>
						</tr>
					<?php
   }
   ?>
		</table>
	</div>

</ul></div></div></div>
	</body>
</html>
