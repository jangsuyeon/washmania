<?php
include "common.php";
include "header.php";

$no = $_GET['no'];
if($no == ""){
    alert("잘못된 접근입니다.");
    echo "<script>history.back();</script>";
    exit;
}
?>
 
                    
                    
                    <div id="cont_bot">
                        <h3 class="mt-3 pb-2 border-bottom">사업장 수정</h3>
                        <form id="modcenter" action="modify_insert.php" method="post" enctype="multipart/form-data">
                            <?
                            $data = mysqli_query($conn, "SELECT * FROM center WHERE no=$no");
                            $row = mysqli_fetch_assoc($data);
                            ?>
                            <input name="no" value="<?=$no;?>" type="hidden" />
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">로고</div>
                                                <div class="col-9">
                                                    <input class="form-control mb-1" type="file" name="centerLogo" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">사업장 이미지</div>
                                                <div class="col-9">
                                                    <input class="form-control" type="file" name="centerImage1" />
                                                    <input class="form-control" type="file" name="centerImage2" />
                                                    <input class="form-control" type="file" name="centerImage3" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">사업장 아이디<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <input value="<?=$row['centerId'];?>" disabled class="form-control req" type="text" name="centerId" maxlength="30" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">사업장 이름<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <input value="<?=$row['centerName'];?>" class="form-control req" type="text" name="centerName" maxlength="30" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">비밀번호</div>
                                                <div class="col-9">
                                                    <input class="form-control" type="password" name="centerPw" maxlength="30" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">운영구분<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <select class="form-select req" name="centerType">
                                                        <?
                                                        if($row['centerType'] == 0){
                                                            $centerType0 = "selected";
                                                            $centerType1 = "";
                                                        }else{
                                                            
                                                            $centerType0 = "";
                                                            $centerType1 = "selected";
                                                        }
                                                        ?>
                                                        <option value="">운영구분 선택</option>
                                                        <option value="gamang"<?=$centerType1;?>>가맹점</option>
                                                        <option value="jikyoung"<?=$centerType0;?>>직영점</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">주소<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <input value="<?=$row['addr0'];?>" readonly class="form-control req" name="addr0" type="text" id="sample4_roadAddress" placeholder="도로명주소">
                                                    <input value="<?=$row['addr1'];?>" class="form-control" name="addr1" type="text" id="sample4_detailAddress" placeholder="상세주소">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">우편번호</div>
                                                <div class="col-9">
                                                    <input value="<?=$row['addr3'];?>" readonly class="form-control req" name="addr3" type="text" id="sample4_postcode" placeholder="우편번호">
                                                    <div class="hstack gap-2">
                                                        <input value="<?=$row['addr2'];?>" class="form-control" name="addr2" type="text" id="sample4_extraAddress" placeholder="참고항목">
                                                        <input readonly class="btn btn-primary btn-sm" type="button" onclick="sample4_execDaumPostcode()" value="우편번호 찾기">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">전화번호<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <input value="<?=$row['phone'];?>" id="centerPhone" class="form-control req" type="text" name="centerPhone" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">사업자 등록번호<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <input value="<?=$row['centerReg'];?>" id="centerReg" class="form-control req" type="text" name="centerReg" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">사업형태<span class="text-danger">*</span></div>
                                                <div class="col-9">
                                                    <select name="centerSize" class="form-select req">
                                                        <?
                                                        if($row['centerSize'] == 0){
                                                            $centerSize0 = "selected";
                                                            $centerSize1 = "";
                                                            $centerSize2 = "";
                                                        }elseif($row['centerSize'] == 1){
                                                            $centerSize0 = "";
                                                            $centerSize1 = "selected";
                                                            $centerSize2 = "";
                                                        }else{
                                                            $centerSize0 = "";
                                                            $centerSize1 = "";
                                                            $centerSize2 = "selected";
                                                        }
                                                        ?>
                                                        <option value="">사업형태 선택</option>
                                                        <option value="nobless" <?=$centerSize0?>>워시매니아 노블리스</option>
                                                        <option value="smart" <?=$centerSize1?>>워시매니아 스마트</option>
                                                        <option value="basic" <?=$centerSize2?>>워시매니아 베이직</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">공간정보</div>
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <label class="w-50 input-group-text" for="garage">게러지</label>
                                                        <select class="form-select" name="garage" id="garage">
                                                            <option value="">선택</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <label class="w-50 input-group-text" for="bay">베이</label>
                                                        <select class="form-select" name="bay" id="bay">
                                                            <option value="">선택</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <label class="w-50 input-group-text" for="air">에어건</label>
                                                        <select class="form-select" name="air" id="air">
                                                            <option value="">선택</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <label class="w-50 input-group-text" for="mat">매트</label>
                                                        <select class="form-select" name="mat" id="mat">
                                                            <option value="">선택</option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">영업시간</div>
                                                <div class="col-9 hstack gap-2">
                                                    <input class="form-control form-control-sm" type="time" id="centerStart" name="centerStart" />
                                                    -
                                                    <input class="form-control form-control-sm" type="time" id="centerEnd" name="centerEnd" />
                                                    <div class="form-check">
                                                        <input id="allday" class="form-check-input" type="checkbox" name="allday" />
                                                        <label for="allday">24시간 운영</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">휴무일</div>
                                                <div class="col-9 day">
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="sun" type="checkbox" />
                                                        일요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="sunall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="sunStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="sunEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="mon" type="checkbox" />
                                                        월요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="monall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="monStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="monEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="tue" type="checkbox" />
                                                        화요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="tueall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="tueStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="tueEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="wed" type="checkbox" />
                                                        수요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="wedall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="wedStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span> 
                                                                <input type="time" class="form-control" name="wedEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="thi" type="checkbox" />
                                                        목요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="thiall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="thiStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="thiEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="fri" type="checkbox" />
                                                        금요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="friall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="friStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="friEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" name="sat" type="checkbox" />
                                                        토요일
                                                    </label>
                                                    <div class="card horn">
                                                        <div class="card-body">
                                                            <label class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="satall" />
                                                                종일
                                                            </label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무시작</span>
                                                                <input type="time" class="form-control" name="satStart" />
                                                            </div>
                                                            <div class="input-group">
                                                                <span class="input-group-text">휴무종료</span>
                                                                <input type="time" class="form-control" name="satEnd" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">점주 ID</div>
                                                <div class="col-9">
                                                    <button onclick="window.open('idsearch.php','master');" class="btn btn-primary" type="button">검색</button>
                                                    <div id="mainId" class="mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">서브관리자 ID</div>
                                                <div class="col-9">
                                                    <button onclick="window.open('idsearch.php','sub');" class="btn btn-primary" type="button">검색</button>
                                                    <div id="subId" class="mt-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">키오스크 ID</div>
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <input type="text" name="kioskId" class="form-control" />
                                                        <button type="button" class="btn btn-primary">중복체크</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">포인트 충전권</div>
                                                <div class="col-9">
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            5,000&#8361; (6,000p)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            10,000&#8361; (12,000p)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            20,000&#8361; (24,000p)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            30,000&#8361; (36,000p)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            50,000&#8361; (60,000p)
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="checkbox" name="p5000" />
                                                            100,000&#8361; (120,000p)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">옵션시설</div>
                                                <div class="col-9">
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="formgun" class="form-check-input" />
                                                            폼건
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="underwash" class="form-check-input" />
                                                            하부세차
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="heatcoil" class="form-check-input" />
                                                            열선
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="dryzone" class="form-check-input" />
                                                            드라이존
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="elec" class="form-check-input" />
                                                            전기차충전
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="cafeteria" class="form-check-input" />
                                                            카페테리아
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="checkbox" name="vaccum" class="form-check-input" />
                                                            진공청소기
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">운영상태</div>
                                                <div class="col-9">
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input checked type="radio" name="centerstatus" class="form-check-input" />
                                                            운영중
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block me-3">
                                                        <label>
                                                            <input type="radio" name="centerstatus" class="form-check-input" />
                                                            미운영중
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">앱 노출 여부</div>
                                                <div class="col-9">
                                                    <div class="form-check d-inline-block">
                                                        <label>
                                                            <input checked type="radio" name="centerExpose" class="form-check-input" />
                                                            노출
                                                        </label>
                                                    </div>
                                                    <div class="form-check d-inline-block">
                                                        <label>
                                                            <input type="radio" name="centerExpose" class="form-check-input" />
                                                            비노출
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="row">
                                                <div class="col-3 fw-bold">RF카드 보증금</div>
                                                <div class="col-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" />
                                                        <span class="input-group-text">
                                                            Point
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg"> 
                                            <div class="row">
                                                <div class="col-3 fw-bold"></div>
                                                <div class="col-9"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-end pt-3 pb-5">
                                <a href="view.php?no=<?=$no;?>" class="btn btn-secondary">뒤로</a>
<!--                                <button class="btn btn-secondary" onclick="history.back();">뒤로</button>-->
                                <button id="modbtn" class="btn btn-primary" type="button">수정하기</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        $("#modbtn").click(function(){
                            var result = 1;
                            $(".req").each(function(){
                                result = result * $(this).val().length;
                            });
                            if(result == 0){
                                alert("필수요소는 반드시 입력해 주세요.");
                            }else{
                                $("#modcenter").submit();
                            }
                        });
                    </script>

<?php
include "footer.php";
?>