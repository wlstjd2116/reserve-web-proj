<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    $con = mysqli_connect("localhost", "root", "", "test");
    $sql = "select A.house_id,  A.house_name, 
   A.house_address, A.contents, count(B.rs_id) as rsCount, B.rs_year, B.rs_month, B.rs_day
   FROM tb_house A left outer join tb_house_reservation B
   on A.house_id = B.house_id
   group by A.house_id
   ORDER BY A.house_id asc;";
   $resultHouse = mysqli_query($con, $sql);
   $rgsql = "select house_id,rs_year, rs_month, rs_day from tb_house_reservation order by house_id asc;";
   $result = mysqli_query($con, $rgsql);
?>
<!doctype html>
<meta charset="utf-8">
<title>T&R 숙소 예약 홈페이지</title>
		<link rel="stylesheet" type="text/css" href = "./css/style.css">
<head>
 
</head>
<body>
	<div class ="wrap">
		<div class = "intro_bg">
			<div class="header">
				<ul class="nav">
					<li><a href="pensionHome.php">HOME</a></li>
					<li><a href="reservation.php">RESERVE</a></li>
					<li><a href="board_list.php">BOARD</a></li>
					<li><a href="notice_list.php">NOTICE</a></li>
					<li><a href="qna_list.php">QNA</a></li>
					<?php
						if($userid == "admin"){
						?>

							<li><a href="admin.php">MNG_PG</a> </li>
							<?php
					}
    					if(!$userid) {
					?>                
                			<li><a href="member_form.php">회원 가입</a> </li>
   					 <?php
   					 }
   					 
   					 else {
              			  $logged = $userid."님";
						?>
                
                 <li><a onclick="window.open('./survey.php','설문조사','left=200,top=200, scrollbars=no, toolbars=no, width=180, height=230')"border="0">SURVEY</a></li>
                <li><?=$logged?> </li>
                <li><a href="member_modify_form.php">정보수정</a></li>

                <li><a href="logout.php">로그아웃</a> </li>
<?php
    }
?>
				<li><?php
    					if(!$userid) {
					?>
					</ul>
						<form id="frm" name="frm" method="post" action="login.php">
							<div class="whitefont">
							ID:<input type="textbox" name="id" placeholder="ID">
							PW:<input type="password" name="pass" placeholder="PW">
							<button style ="color: black;" onclick="javascript:document.frm.submit();">로그인</button>
							</div>
					</li>	
					                
   					 <?php
   					 }
   					 ?>
						
			</div>
			
		<!-- intro end -->
			<div style="width:1100px; margin:0px auto; background-color:rgba(0, 0, 0, 0.5);margin-top:30px;padding: 30px 30px; border-radius: 30px;">
		<table style="width:100%">
			<tr style="height:33px; background-color:rgba(0, 0, 0,0.4); color:white; text-align:center;">
				<td>
					사진
				</td>
				<td>
					No.
				</td>
				<td>
					펜션 이름
				</td>
				<td>
					주소
				</td>
				<td>
					설명
				</td>
				<td>
					예약일자
				</td>
			</tr>
			 
			<?php
			$idx = 1;
				while($row = mysqli_fetch_array($resultHouse))
				{ 
					$isReservation = false;
					if($row["rsCount"] > 0)
					{
						$isReservation = true;
					}
					?>
						<tr style="height:33px; text-align:center">
							<td>
								<img src="./image/0<?="$idx"?>.jpg" width="300" height="200"/>
							</td>
							<td>
								<div style="color: white;"><?=$row['house_id']?></div>
							</td>
							<td>
								<div style="color:white;"><?=$row['house_name']?></div>
							</td>
							<td>
								<div style="color:white;"><?=$row['house_address']?></div>
							</td>
							<td>
								<div style="color:white;"><?=$row['contents']?></div>
							</td>
							<td>
								<?php
									if($isReservation)
									{	
										// for($j=0; $j<$row['rsCount']; $j++){		
										// 	mysqli_data_seek($result, $j);
										// 	$row1 = mysqli_fetch_array($result);	
										$j = 0;
										mysqli_data_seek($result, $j);
										while($row1= mysqli_fetch_array($result)){
											if($row1['house_id'] == $row['house_id']){											
											?>
											<div style="color: yellow;"><?=$row1['rs_year']?>년 <?=$row1['rs_month']?>월 <?=$row1['rs_day']?>일</div>
											
										<?php	
											}
										}						
									}
									else
									{
										?>
											<div style="color: white">예약되지않음</div>
										<?php
									}$idx++;

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
