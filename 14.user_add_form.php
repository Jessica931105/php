<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    error_reporting(0);// 關閉錯誤回報，避免顯示警告訊息
    session_start();// 啟動 session，才能使用 $_SESSION 儲存或取得登入資訊
     // 檢查是否已有登入的使用者
    if (!$_SESSION["id"]) {
        // 若沒有登入，顯示提示訊息並在3秒後導向登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        // 若已登入，顯示新增使用者的表單
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>     <!-- 輸入帳號 -->
                密碼：<input type=text name=pwd><p></p> <!-- 輸入密碼 -->
                <input type=submit value=新增> <!-- 提交表單 --> <input type=reset value=清除> <!-- 清除表單 -->
            </form>
        ";
    }
?>
    </body>
</html>

