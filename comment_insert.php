<?php
session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    $comment = $_POST['comment'];
    $rgday = date("Y-m-d (H:i)");
    $con = mysqli_connect("localhost", "root", "", "test");
    $sql = "insert into comment(c_id, u_id, contents, time) ";
    $sql .= "values('$userid', '$userid', '$comment', '$rgday)";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

            echo("
              <script>
                location.href = 'qna_list.php';
              </script>
            ");     
?>