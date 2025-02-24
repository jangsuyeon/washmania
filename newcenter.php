<?
include "common.php";

$centerId = $_POST['centerId'];
$centerName = $_POST['centerName'];
$centerPw = $_POST['centerPw'];
$centerType = $_POST['centerType'];
$addr0 = $_POST['addr0']; 
$addr1 = $_POST['addr1'];
$addr2 = $_POST['addr2'];
$addr3 = $_POST['addr3'];
$centerPhone = $_POST['centerPhone'];
$centerReg = $_POST['centerReg'];
$centerSize = $_POST['centerSize'];

$centerPw = password_hash($centerPw, PASSWORD_DEFAULT);

if($centerType == "gamang"){
    $centerType = 0;
}elseif($centerType == "jikyoung"){
    $centerType = 1;
}else{
    echo "<script>location.href='https://police.go.kr';</script>";
}

if($centerSize == "nobless"){
    $centerSize = 0;
}elseif($centerSize == "smart"){
    $centerSize = 1;
}elseif($centerSize == "basic"){
    $centerSize = 2;
}else{
    echo "<script>location.href='https://police.go.kr';</script>";
}

$date = date("Y-m-d");

mysqli_query($conn, "INSERT INTO center (centerId, centerName, centerPw, centerType, addr0, addr1, addr2, addr3, phone, centerReg, centerSize, date) VALUES('$centerId', '$centerName', '$centerPw', $centerType, '$addr0', '$addr1', '$addr2', '$addr3', '$centerPhone', '$centerReg', $centerSize, '$date');") or die("DB 입력 오류 : ".mysqli_error($conn));

alert("지점 등록이 완료되었습니다.");
location("list.php?page=1");

//echo "$centerId<br/>"
//echo "$centerPW<br/>"
//echo "$centerName<br/>"
//echo "$centerType<br/>"
//echo "$addr0<br/>"
//echo "$addr1<br/>"
//echo "$addr2<br/>"
//echo "$addr3<br/>"
//echo "$centerPhone<br/>"
//echo "$centerReg<br/>"
//echo "$centerSize<br/>"
//echo "$date<br/>"

?>