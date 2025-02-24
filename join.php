<?
include "common.php";
include "header.php";
?>

<div class="my-3">
    <form id="joinform" action="join_insert.php" method="post">
        
        <div class="accordion" id="agree">
            <div class="accordion-item">
                <h2 class="accordion-header" id="agareeOne"> 
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agreecollapseOne" aria-expanded="true" aria-controls="agreecollapseOne">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="joinagree" id="joinagree" />
                            개인정보 수집 동의 <span class="text-primary">(필수)</span>
                        </label>
                    </button>
                </h2>
                <div id="agreecollapseOne" class="accordion-collapse collapse" aria-labelledby="agreeOne" data-bs-parent="#agree">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item mb-4">
                <h2 class="accordion-header" id="agreeTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agreecollapseTwo" aria-expanded="false" aria-controls="agreecollapseTwo">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input" name="marketing" id="marketing" />
                            마케팅 정보 수신 동의 <span class="text-primary">(선택)</span>
                        </label>
                    </button>
                </h2>
                <div id="agreecollapseTwo" class="accordion-collapse collapse" aria-labelledby="agreeTwo" data-bs-parent="#agree">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control req" id="userId" name="userId" placeholder=" ">
            <label for="userId">사용자 아이디 <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control req" id="userPw" name="userPw" placeholder=" ">
            <label for="userPw">사용자 비밀번호 <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control req" id="userName" name="userName" placeholder=" ">
            <label for="userName">사용자 성명 <span class="text-danger">*</span></label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="birth" name="birth" placeholder=" ">
            <label for="birth">생년월일</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control req" id="phone" name="phone" placeholder=" ">
            <label for="phone">전화번호 <span class="text-danger">*</span></label>
        </div>
        <div class="text-center">
            <button type="reset" class="btn btn-secondary">초기화</button>
            <button id="joinbtn" type="button" class="btn btn-primary">회원가입</button>
        </div>
    </form> 
    <script>
        $("#joinform input:not(.accordion input)").attr("disabled","disabled");
        $("#joinagree").click(function(){
            if($(this).is(":checked")){
                $("#joinform input:not(.accordion input)").removeAttr("disabled");
            }else{
                $("#joinform input:not(.accordion input)").attr("disabled","disabled");
            }
        });
        $("#joinbtn").click(function(){
            var result = 1;
            $(".req").each(function(){
                result *= $(this).val().length;
            });
            if(result == 0){
                alert("필수 요소를 모두 입력해 주세요");
            }else{
                $("#joinform").submit();
            }

        });
    </script>
</div>

<?
include "footer.php"; 
?>