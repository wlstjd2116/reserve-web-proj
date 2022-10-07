<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-bottom: solid 5px #111;
   text-align: center;
}
#close {
   margin:0 auto;
   cursor:pointer;
   text-align: center;
}
</style>
</head>
<body>
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"];

   if(!$id) 
   {
      echo"<div align='center'>아이디를 입력해주세요!</div>";
   }
   else
   {
      $con = mysqli_connect("localhost", "root", "", "test");

 
      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo "<div align='center'>".$id." 아이디는 중복됩니다.</div>";
         echo "<div align='center'>다른 아이디를 사용해 주세요!</div>";
      }
      else
      {
         echo "<div align='center'>".$id." 아이디는 사용 가능합니다.</div>";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <img src="./img/close.png" onclick="javascript:self.close()">
</div>
</body>
</html>

