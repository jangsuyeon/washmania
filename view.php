<?
include "common.php";
include "header.php";

$no = $_GET['no'];
if($no == ""){
    alert("잘못된 접근입니다.");
    echo "<script>history.back();</script>";
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM center WHERE no=$no;");
$row = mysqli_fetch_assoc($data);
?>

<ul class="list-group">
    <li class="list-group-item active">
        <b>
        <?=$row['no'];?>. <?=$row['centerName'];?>(<?=$row['centerId'];?>) 
        </b>
    </li>
    <li class="list-group-item">
        <table class="table">
            <tr>
                <th>지점명</th>
                <td><?=$row['centerName'];?></td>
            </tr>
            <tr>
                <th>지점아이디</th>
                <td><?=$row['centerId'];?></td>
            </tr>
            <tr>
                <th>운영구분</th>
                <?
                if($row['centerName'] == 0){
                    $type = "직영점";
                }else{
                    $type = "가맹점";
                }
                ?>
                <td><?=$row['centerType'];?></td>
            </tr>
            <tr>
                <th>사업형태</th>
                <?
                if($row['centerName'] == 0){
                    $size = "노블리스";
                }elseif($row['centerName'] == 1){
                    $size = "스마트";
                }else{
                    $size = "베이직";
                }
                ?>
                <td><?=$row['centerSize']?></td>
            </tr>
            <tr>
                <th>주소</th>
                <td>
                    <?=$row['addr3'];?>,
                    <?=$row['addr0'];?>
                    <?
                    if($row['addr1'] !=""){
                        echo ", ".$row['addr1'];
                    }
                    if($row['addr2'] !=""){
                        echo " (".$row['addr1'].")";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>전화번호</th>
                <td><?=$row['phone'];?></td>
            </tr>
            <tr>
                <th>사업자등록번호</th>
                <td><?=$row['centerReg'];?></td>
            </tr>
            <tr>
                <th>등록일</th>
                <td><?=$row['date'];?></td>
            </tr>
        </table>
    </li>
    <li class="list-group-item">
        <div class="row">
            <?
            $prevdata = mysqli_query($conn, "SELECT no,centerName FROM center WHERE no<$no ORDER BY no DESC LIMIT 0, 1;");
            $prevlen = mysqli_num_rows($prevdata);
            if($prevlen == 0){
                $prevlink = "#";
                $prevname = "이전 글이 없습니다.";
            }else{
                $prevrow = mysqli_fetch_assoc($prevdata);
                $prevlink = "view.php?no={$prevrow['no']}";
                $prevname = $prevrow['centerName'];
            }
            ?>
            <a href="<?=$prevlink;?>" class="col-6 border-end">
                이전글
                <p class="text-truncate"><?=$prevname;?></p> 
            </a>
            <?
            $nextdata = mysqli_query($conn, "SELECT no,centerName FROM center WHERE no>$no ORDER BY no ASC LIMIT 0, 1;");
            $nextlen = mysqli_num_rows($nextdata);
            if($nextlen == 0){
                $nextlink = "#";
                $nextname = "다음 글이 없습니다.";
            }else{
                $nextrow = mysqli_fetch_assoc($nextdata);
                $nextlink = "view.php?no={$nextrow['no']}";
                $nextname = $nextrow['centerName'];
            }
            ?>
            <a href="<?=$nextlink;?>" class="col-6 text-end">
                이후글
                <p class="text-truncate"><?=$nextname;?></p>
            </a>
        </div>
    </li>
    <li class="list-group-item text-end">
        <a id="delbtn" href="delete.php?no=<?=$no;?>" class="btn btn-danger">삭제</a>
        <a href="modify.php?no=<?=$no;?>" class="btn btn-success">수정</a>
        <?
        $pagedata = mysqli_query($conn, "SELECT no FROM center WHERE no>$no;");
        $pagelen = mysqli_num_rows($pagedata);
        $page = ceil(($pagelen + 1) / $postperpage);
        ?>
        <a href="list.php?page=<?=$page;?>" class="btn btn-primary">리스트</a>
    </li>
</ul>
<script>
    // #delbtn이 눌리면 다음과 같은일이 벌어질것이다.
        // 방금눌린그것이 눌렸을때 기본적으로 해야할 일을 잠시 멈춰두고
        // confirm창을 열어서  "정말로 삭제하시겠습니까?"라는 메세지를 노출하고
        // confirm에서 확인을 눌렀다면
            // 방금눌린그것의 속성중 href라는 속성의 값을 이용해서
            // 해당위치로 이동하자.
    $("#delbtn").click(function(event){
        event.preventDefault();
        var conf = window.confirm("정말로 삭제하시겠습니까?");
        if(conf){
            location.href = $(this).attr("href");
        }
    });
</script>

<?
include "footer.php";
?>