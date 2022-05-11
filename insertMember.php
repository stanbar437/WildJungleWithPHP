<?php

require __DIR__ . '/parts/__connect_db.php';
$title = '新增會員';
$pagename = 'insert';

?>

<?php include __DIR__ . '/parts/__html_head.php' ?>
<?php include __DIR__ . '/parts/__sidebar.php' ?>
<style>
    .container1 {
        width: calc(100% - 250px);
        position: relative;
        left: 250px;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    .card-title{ 
        text-align: center;
        top: 0;
        position: absolute;
        padding: 10px 0;
        width: 100%;
        background-color:  #2f4f4f;
        color: white;
        left: 0;
        border-radius: 5px 5px 0 0;
    }

    .row {
        justify-content: center;
    }

    .subbtn {
        background-color: #2f4f4f;
        border-color: #2f4f4f;
    }

    .subbtn:hover {
        background-color: #908a70;
        border-color: #908a70;
    }

    .subbtn:active {
        background-color: #2f4f4f;
        border-color: #2f4f4f;
        box-shadow:0 0 0 2px #daa520;
    }
    .subbtn:focus {
        background-color: #2f4f4f;
        border-color: #2f4f4f;
        box-shadow:0 0 0 2px #daa520;
    }
    .form-text {
        color: crimson;
    }
</style>

    <div class="container1 d-flex justify-content-center">
        <!-- <div class="row"> -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title5 mt-2" style="color: white;">dsjfkesjfewji</h5>
                        <h5 class="card-title text-center">新增會員</h3>

                        <form name="form_member" onsubmit="sendData(); return false;">
                            <div class="mb-3">
                                <label for="email" class="form-label">電子郵件</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">姓名</label>
                                <input type="text" class="form-control" id="name" name="name">
                                <div class="form-text"></div>
                                <!-- 將所有適用的字符轉換為 HTML 實體 -->
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">密碼</label>
                                <input type="text" class="form-control" id="password" name="password">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">手機</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" data-pattern="09\d{2}-?\d{3}-?\d{3}">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="birthday" class="form-label">生日</label>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">地址</label>
                                <textarea name="address" id="address" cols="30" rows="3"></textarea>
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="grade_sid" id="inlineRadio1" value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1">一般</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="grade_sid" id="inlineRadio2" value="2">
                                    <label class="form-check-label" for="inlineRadio2">黃金</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="grade_sid" id="inlineRadio3" value="3">
                                    <label class="form-check-label" for="inlineRadio3">白金</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="grade_sid" id="inlineRadio4" value="4">
                                    <label class="form-check-label" for="inlineRadio4">鑽石</label>
                                </div>
                            </div>

                            <button type="submit" class="subbtn btn btn-primary">新增</button>
                        </form>

                    </div>
                <!-- </div> -->
            </div>
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel"></h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- <div class="modal-body">
                    ...
                </div> -->
                    <div class="modal-footer">
                        <button type="button" id="ok" onclick="ok()" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include __DIR__ . '/parts/__scripts.php' ?>
<script>
    const email = document.querySelector('#email');
    const name = document.querySelector('#name');
    const mobile = document.querySelector('#mobile');
    const password = document.querySelector('#password');


    const modal = new bootstrap.Modal(document.querySelector('#exampleModal'));

    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    function sendData() {
        email.nextElementSibling.innerHTML = '';
        name.nextElementSibling.innerHTML = '';
        mobile.nextElementSibling.innerHTML = '';
        password.nextElementSibling.innerHTML = '';
        birthday.nextElementSibling.innerHTML = '';

        let isPass = true;
        // 檢查
        if (email.value && !email_re.test(email.value)) {
            isPass = false;
            email.nextElementSibling.innerHTML = '請輸入正確的email';
        }
        if (name.value.length < 2) {
            isPass = false;
            name.nextElementSibling.innerHTML = '請輸入正確的姓名';
        }
        if (mobile.value && !mobile_re.test(mobile.value)) {
            isPass = false;
            mobile.nextElementSibling.innerHTML = '請輸入正確的手機號碼';
        }
        if (password.value.length < 5) {
            isPass = false;
            password.nextElementSibling.innerHTML = '密碼長度不足';
        }
        if (!birthday.value) {
            isPass = false;
            birthday.nextElementSibling.innerHTML = '請填寫生日';
        }

        // const ok = document.querySelector('#ok');
        if (isPass) {
            const fd = new FormData(document.form_member);

            fetch('insertMember-api.php', {
                    method: 'POST',
                    body: fd,
                }).then(r => r.json())
                .then(obj => {
                    if (obj.success) {
                        // alert('新增成功');
                        // location.href = 'memberList.php';
                        document.querySelector('.modal-header').innerHTML = '新增成功';
                        modal.show();


                    } else {
                        document.querySelector('.modal-header').innerHTML = obj.error || '資料新增失敗';
                        modal.show();
                    }
                })
        }

    }

    function ok() {
        location.href = 'memberList.php';
    }
</script>

<?php include __DIR__ . '/parts/__html_foot.php' ?>