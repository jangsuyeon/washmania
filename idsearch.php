<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1, width=device-width" />
        <title>아이디 검색</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container" style="max-width: 400px;">
            <label for="userid" class="mt-4 mb-2">
                ID(전화번호) 검색
            </label>
            <form id="idsearch" action="idsearch_insert.php" method="get">
                <div class="input-group">
                    <input id="userid" class="form-control" type="text" name="userid" />
                    <button id="searchbtn" class="btn btn-primary" type="button">검색</button>
                </div>
            </form>
            <div id="result" class="border my-2 p-2">
                &nbsp;
            </div>
        </div>
        
        
        <script>
            var who = window.name;
            var query = location.search;
            query = query.replace("?id=","");
            if(query != ""){
                $("#result").append("<a href='#' id='returnBtn'>"+query+"</a>");
            }
            
            $("#searchbtn").click(function(){
                var txt = $("#userid").val();
                if(txt.length == 0){
                    alert("아이디를 입력해 주세요");
                }else{
//                    $("#idsearch").submit();
                    location.href = location.href + "?id=" +txt;
                }
            });
            
            $("#returnBtn").click(function(){
                window.opener.postMessage({
                    from: who,
                    userid: query
                },"*");
                window.close();
            });
            
//            criminal.person.lastName
//            
//            var criminal = {
//                "person": {
//                    "firstName": "창원",
//                    "lastName": "신",
//                    "birth": "1974-02-12",
//                    "personalId": "740212-1234567"
//                },
//                "crime": [
//                    {
//                        "crimeId": "123456",
//                        "crimeType": "A03",
//                        "victim": "홍길동",
//                        "crimeCont": "상기 용의자는 홍길동이를 때렸음"
//                    }, {
//                        "crimeId": "123457",
//                        "crimeType": "A06",
//                        "victim": "임꺽정",
//                        "crimeCont": "상기 용의자는 임꺽정이의 돈 1,000원을 떼먹었음"
//                    }, {
//                        "crimeId": "123458",
//                        "crimeType": "C07",
//                        "victim": "일지매",
//                        "crimeCont": "상기 용의자는 회사돈 2,000원을 횡령하였음"
//                    }
//                ]
//            }
            
            
        </script>
        
<!--
        <crimianl>
            <person>
                <lastName>신</lastName>
                <firstName>창원</firstName>
            </person>
            
            <crime>
                
            </crime>
        </crimianl>
-->
        
    </body>
</html>