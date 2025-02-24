<!doctype html>
<html> 
    <head> 
        <meta charset="utf-8" />
        <meta name="author" content="장수연" />
        <meta name="keywords" content="워시매니아, 세차, 셀프, 무인세차" />
        <meta name="description" content="신개념 무인 셀프 세차서비스" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />
        <meta property="og:keywords" content="워시매니아, 세차, 셀프, 무인세차" />
        <meta property="og:title" content="워시매니아 - 신규사업장 등록" />
        <meta property="og:description" content="신개념 무인 셀프 세차서비스" />
        <meta property="og:url" content="http://poo1357.dothome.co.kr/washmania" />
        <meta property="og:images" content="http://poo1357.dothome.co.kr/washmania/images/og.jpg" />
        <title>워시매니아 - 신규사업장 등록</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="css/common.css?ver=<?=time();?>" rel="stylesheet" />
        <link href="favicon.ico" rel="icon shortcut" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/7481093cfd.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <header class="col-md-3 border-end py-2">
                    <h1>
                        <a class="d-block" href="index.php">
                            <img class="img-fluid d-block" src="images/header_logo.png" alt="logo" />
                        </a>
                    </h1>
                    <p><small>워시매니아 관리자페이지</small></p>
                    
                    <div class="accordion" id="menu">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    시설관리
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#menu">
                                <div class="accordion-body py-2 px-3">
                                    <a href="/index.php" class="d-block">사업장등록</a>
                                    <a href="/list.php?page=1" class="d-block">사업장리스트</a>
                                    <!-- <a href="#" class="d-block">사업장수정</a> -->
                                    <!-- <a href="#" class="d-block">사업장삭제</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    회원관리
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#menu">
                                <div class="accordion-body py-2 px-3">
                                    <!-- <a href="#" class="d-block">회원리스트</a> -->
                                    <a href="/join.php" class="d-block">회원 등록</a>
                                    <!-- <a href="#" class="d-block">메시지전송</a>
                                    <a href="#" class="d-block">쿠폰관리</a> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    정산관리
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#menu">
                                <div class="accordion-body py-2 px-3">
                                    <a href="#" class="d-block">매출조회</a>
                                    <a href="#" class="d-block">매출취소</a>
                                    <a href="#" class="d-block">계산서발행</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    
                </header>
                
                <section class="col-md-9">
                    <div id="cont_top"class="border-bottom mx-n2">
                        <div class="hstack gap-2">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                <ol class="breadcrumb border my-2 p-1 pe-3 rounded">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">시설관리</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">사업장등록</li>
                                </ol>
                            </nav>
                            <div class="py-2 text-end ms-auto">
                                <a class="btn btn-outline-primary" href="join.php">회원가입</a>
                                <a class="btn btn-outline-primary" href="login.php">로그인</a>
<!--
                                <span id="userid" class="fw-bold">kim1234</span>님 안녕하세요!
                                <button class="btn btn-outline-primary btn-sm" type="button">로그아웃</button>
-->
                            </div>
                        </div>
                    </div>