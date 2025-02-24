<?
include "common.php";

$no = $_GET['no'];
if($no == ""){
    alert("잘못된 접근입니다.");
    echo "<script>history.back();</script>";
    exit;
}

mysqli_query($conn, "DELETE FROM center WHERE no=$no;");
alert("해당 정보가 삭제되었습니다.");
location("list.php?page=1");

?>