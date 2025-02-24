<?php
header("Content-Type:text/html; charset=utf-8;");

$conn = mysqli_connect("localhost","**","**!","**") or die("db접속 에러");

mysqli_query($conn, "SET SESSION CHARACTER_SET_CONNECTION=utf8;");
mysqli_query($conn, "SET SESSION CHARACTER_SET_RESULTS=utf8;");
mysqli_query($conn, "SET SESSION CHARACTER_SET_CLIENT=utf8;");

session_start();

function alert($message){
    echo "<script>alert('$message')</script>"; 
}

function location($file){
    echo "<script>location.href = '$file';</script>";
}

$postperpage = 12; // 한 페이지 당 보여줄 게시물 수
$pageperblock = 5; // 한 블록 당 보여줄 페이지 수 

//$_SESSION['lang'] = 1; 
//
//function lang($text){
//    $text = explode("||", $text);
//    echo $text[$_SESSION['lang']];
//}


?>