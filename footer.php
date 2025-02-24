                </section>
            </div>
        </div>
        
         
        
        
        
        
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="script/script.js"></script>
        
        <script src="http://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script>
            //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
            function sample4_execDaumPostcode() {
                new daum.Postcode({
                    oncomplete: function(data) {
                        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
        
                        // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                        var roadAddr = data.roadAddress; // 도로명 주소 변수
                        var extraRoadAddr = ''; // 참고 항목 변수
        
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                            extraRoadAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if(data.buildingName !== '' && data.apartment === 'Y'){
                           extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if(extraRoadAddr !== ''){
                            extraRoadAddr = ' (' + extraRoadAddr + ')';
                        }
        
                        // 우편번호와 주소 정보를 해당 필드에 넣는다.
                        document.getElementById('sample4_postcode').value = data.zonecode;
                        document.getElementById("sample4_roadAddress").value = roadAddr;
                        document.getElementById("sample4_jibunAddress").value = data.jibunAddress;
                        
                        // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                        if(roadAddr !== ''){
                            document.getElementById("sample4_extraAddress").value = extraRoadAddr;
                        } else {
                            document.getElementById("sample4_extraAddress").value = '';
                        }
        
                        var guideTextBox = document.getElementById("guide");
                        // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                        if(data.autoRoadAddress) {
                            var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                            guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                            guideTextBox.style.display = 'block';
        
                        } else if(data.autoJibunAddress) {
                            var expJibunAddr = data.autoJibunAddress;
                            guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                            guideTextBox.style.display = 'block';
                        } else {
                            guideTextBox.innerHTML = '';
                            guideTextBox.style.display = 'none';
                        }
                    }
                }).open();
            }
        </script>
        <script>
            // 숫자와 "-"를 제외한 나머지를 지운다.
            // 세자리 숫자 이후에 "-"를 붙인다.
            // ###-####까지 쓰면 또 뒤에 "-"를 붙인다.
            // ###-####-#### 까지 쓰면 더이상 글씨를 쓸 수 없다.
            
            // 위 이야기들은 #centerPhone에서 키가 눌렸다가 뗄때 실행
            $("#centerPhone").keyup(function(){
                var txt = $(this).val();
                txt = txt.replace(/(?!-)\D/g, "");
                if(txt.length > 13){
                    txt = txt.substr(0,13);
                }else if(txt.length == 11 && !txt.match(/-/g)){
                    txt = txt.substr(0,3)+"-"+txt.substr(3,4)+"-"+txt.substr(7,4);
                }
                $(this).val(txt);
            });
            $("#centerReg").keyup(function(){
                var txt = $(this).val();
                txt = txt.replace(/(?!-)\D/g, "");
                if(txt.length > 12){
                    txt = txt.substr(0,12);
                }else if(txt.length == 9 && !txt.match(/-/g)){
                    txt = txt.substr(0,3)+"-"+txt.substr(3,2)+"-"+txt.substr(5,5);
                }
                $(this).val(txt);
            });
            
            // #allday를 클릭했을때
                // 그것이 체크 된 상태였다면
                    // #centerStart, #centerEnd를 비활성화 하자.
                // 그렇지 않으면
                    // #centerStart, #centerEnd를 활성화 하자.
            $("#allday").click(function(){
                if($(this).is(":checked")){
                    $("#centerStart, #centerEnd").attr("disabled","disabled");
                }else{
                    $("#centerStart, #centerEnd").removeAttr("disabled");
                }
            });
            
            // .day의 자식 label의 자식 input을 눌렀을 때
                // 그것이 체크되어있었던가?
                    // 그것의 부모의 동생(.horn)을 보여준다.
                // 그렇지 않다면
                    // 그것의 부모의 동생(.horn)을 숨겨준다.
            $(".day>label>input").click(function(){
                if($(this).is(":checked")){
                    $(this).parent().next(".horn").stop().slideDown();
                }else{
                    $(this).parent().next(".horn").stop().slideUp();
                }
            });
            
            $(".card-body>label>input").click(function(){
                if($(this).is(":checked")){
                   $(this).parent().nextAll().children("input").attr("disabled","disabled");
                }else{
                    $(this).parent().nextAll().children("input").removeAttr("disabled","disabled");
                }
            });
            
            window.addEventListener("message",function(event){
                if(event.data.from == "master"){
                    $("#mainId").html("<div class='input-group input-group-sm'><input value='"+event.data.userid+"' type='text' class='form-control' name='bossId' readonly /><button type='button' class='btn btn-danger delbtn'>삭제</button></div>");
                }else{
                    $("#subId").append("<div class='input-group input-group-sm'><input value='"+event.data.userid+"' type='text' class='form-control' name='subId' readonly /><button type='button' class='btn btn-danger delbtn'>삭제</button></div>");
                    var num = 0;
                    $("#subId>.input-group>input").each(function(){
                        num++;
                        $(this).attr("name","subId"+num);
//                        for(i=0, i<$("#subId>.input-group>input").length; i++){
//                            $("#subId>.input-group>input")[i].attr("name","subId"+num);
//                        }
                    });
                }
            });
            
            $(document).on("click", ".delbtn", function(){
                $(this).parent().remove();
                var num = 0;
                $("#subId>.input-group>input").each(function(){
                    num++;
                    $(this).attr("name","subId"+num);
                });
            });
            
            $("#addbtn").click(function(){
                var a = [];
                var result = 1;
                $(".req").each(function(){
                    a.push($(this).val().length);
                });
                a.forEach(function(item){
                    result *= item;
                });
                if(result == 0){
                    alert("필수요소는 반드시 입력해 주세요."); 
                }else{
                    $("#newcenter").submit(); 
                }
            }); 
            
        </script>
        
        
    </body>
</html>