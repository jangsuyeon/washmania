<?
include "common.php";

$marketing = $_POST['marketing'];
if($marketing == "on"){
    $marketing = 1;
}else{
    $marketing = 0;
}
$userId = $_POST['userId'];
$userPw = $_POST['userPw'];
$userPw = password_hash($userPw, PASSWORD_DEFAULT);
$userName = $_POST['userName'];
$birth = $_POST['birth'];
if($birth == ""){
    $birth = "0000-00-00 00:00:00";
}
$phone = $_POST['phone'];
$date = date("Y-m-d");
$userLv = 1;
$point = 0;
$favortie = "";

mysqli_query($conn, "INSERT INTO member (userId, userPw, userName, userLv, date, birth, phone, point, favorite, marketing) VALUES ('$userId', '$userPw', '$userName', $userLv, '$date', '$birth', '$phone', $point, '$favorite', $marketing);") or die("회원정보 입력 오류 : ".mysqli_error($conn));
alert("회원 등록이 완료 되었습니다.\\n로그인을 해주세요");
location("index.php");


?>