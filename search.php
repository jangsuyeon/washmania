<?
include "common.php";
include "header.php";

$range = $_GET['range'];
$search = $_GET['search'];
if($range == "" || $search == ""){
//if($range != "centerName" || $range != "addr0" || $search == ""){
    alert("잘못된 접근입니다.");
    echo "<script>history.back();</script>";
    exit;
}

// 검색된 전체 게시물 수 파악하기
$pndata = mysqli_query($conn, "SELECT no FROM center WHERE $range LIKE '%$search%';");
$totalpost = mysqli_num_rows($pndata); // 전체 게시물 수
$totalpage = ceil($totalpost/$postperpage); // 전체 페이지 수 = 올림(전체 게시물 수/한 페이지당 보여줄 게시물 수)
$totalblock = ceil($totalpage/$pageperblock);

// *******현재 페이지(보고싶은 페이지)*******
// 페이지 설정이 있으면(n번 페이지를 보자라고 이야기를 했다면)
    // 보면된다.
// 페이지 설정이 없으면
    // 1번페이지를 보고싶은 것으로 간주하자.
$curpage = $_GET['page'];
if($curpage == ""){
    $curpage = 1;
}elseif($curpage > $totalpage){
    alert("해당 페이지가 존재하지 않습니다.");
    location("search.php?range=$reange&search=$search&page=1");
    exit;
}

?>
<div id="boardlist" class="mt-2">
    <div id="boardtop" class="row">
        <h3>검색 결과 <small>(검색어 : <?=$search;?>)</small></h3>
        <div id="boardinfo" class="col-md">
            총 <?=$totalpost;?>지점 | 현재 페이지 <?=$curpage;?> / <?=$totalpage;?>
        </div>
        <div id="boardsearch" class="col-md text-end">
            <form id="searchform" action="search.php" method="get">
                <div class="input-group">
                    <select name="range" class="form-select">
                        <option value="centerName">지점명</option>
                        <option value="addr0">주소</option>
                    </select>
                    <input type="text" name="search" class="form-control" placeholder="검색어 입력"/>
                    <button id="searchbtn" type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <script>
                $("#searchbtn").click(function(){
                    if($("#searchform input").val().length < 2){
                        alert("검색어는 두글자 이상으로 입력해 주세요.");
                    }else{
                        $("#searchform").submit(); 
                    }
                });
            </script>
        </div>
    </div>
    <div id="boardcont">
        <ul class="list-group my-2">
            <li class="list-group-item active overflow-auto">
                <span class="bno">No.</span>
                <span class="bname text-center">지점명</span>
                <span class="bid">지점ID</span>
                <span class="bsize">사업형태</span>
                <span class="bphone">전화번호</span>
            </li>
            <?
            $start = ($curpage - 1) * $postperpage;
            $data = mysqli_query($conn, "SELECT * FROM center WHERE $range LIKE '%$search%' ORDER BY no DESC LIMIT $start, $postperpage;");
            $len = mysqli_num_rows($data);
            for($i=0; $i<$len; $i++){ 
                $row = mysqli_fetch_assoc($data);
                
                if($row['centerType'] == 0){
                    $type = "<span class='badge rounded-pill bg-primary'>직영점</span>";
                }else{
                    $type = "<span class='badge rounded-pill bg-success'>가맹점</span>";
                }
                
                if($row['centerSize'] == 0){
                    $size = "노블리스";
                }elseif($row['centerSize'] == 1){
                    $size = "스마트";
                }else{
                    $size = "베이직";
                }
                echo "<li class='list-group-item'>";
                    echo "<a href='view.php?no={$row['no']}' class='text-dark'>";
                        echo "<span class='bno'>{$row['no']}</span>";
                        echo "<span class='bname'>$type {$row['centerName']}</span>";
                        echo "<span class='bid'>{$row['centerId']}</span>";
                        echo "<span class='bsize'>$size</span>";
                        echo "<span class='bphone'>{$row['phone']}</span>";
                    echo "</a>";
                echo "</li>";
            }
            if($len == 0){
                echo "<li class='list-group-item'>검색 결과가 없습니다.</li>";
            }
            ?>
        </ul>
    </div>
    <?
    $curblock = ceil($curpage / $pageperblock);
    $blockstart = ($curblock - 1) * $pageperblock + 1;
    $prevblock = $blockstart - 1;
    $nextblock = $blockstart + $pageperblock;
    ?>
    <div id="boardpagi">
        <ul class="pagination justify-content-center">
            <?
            if($curblock <= 1){
                $prevdisabled = "disabled";
            }
            echo "<li class='page-item $prevdisabled'>";
            echo "<a class='page-link' href='?page=$prevblock&range=$range&search=$search'>";
            echo "<i class='fas fa-angle-left'></i>";
            echo "</a>";
            echo "</li>";
            for($j=0; $j<$pageperblock; $j++){
                $pnum = $blockstart + $j;
                if($pnum <= $totalpage){
                    if($pnum == $curpage){
                        $pactive = "active";
                        $plink = "#";
                    }else{
                        $pactive = "";
                        $plink = "?page=$pnum&range=$range&search=$search";
                    }
                    echo "<li class='page-item $pactive'>";
                        echo "<a href='$plink' class='page-link'>";
                            echo $pnum; 
                        echo "</a>";
                    echo "</li>";
                }
            }
            if($curblock >= $totalblock){
                $nextdisabled = "disabled";
            }
            echo "<li class='page-item $nextdisabled'>";
            echo "<a class='page-link' href='?page=$nextblock&range=$range&search=$search'>";
            echo "<i class='fas fa-angle-right'></i>";
            echo "</a>";
            echo "</li>";
            ?>
           
        </ul>
    </div>
    <div id="boardbtns" class="text-end">
        <a href="index.php" class="btn btn-primary">지점 등록하기</a>
    </div>
</div>

<?
include "footer.php";
?>