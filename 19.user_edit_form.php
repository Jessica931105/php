<html>
    <head><title>修改使用者</title></head>
    <body>
    <?php
    error_reporting(0);// 關閉錯誤顯示，避免將錯誤訊息暴露給使用者
    session_start();// 啟用 session 功能，用來確認是否登入
    // 檢查是否登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";// 如果未登入，提示訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 3 秒後跳轉回登入頁面
    }
    else{   
        // 若已登入，開始處理資料庫操作
        // 連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
         // 根據從網址列(GET方式)取得的 id 查詢該使用者的資料
        $result=mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
         // 將查詢結果轉成陣列格式
        $row=mysqli_fetch_array($result);
         // 顯示使用者的修改表單
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            <!-- 顯示帳號（不可修改） -->
            帳號：{$row['id']}<br> 
            <!-- 顯示目前密碼並可修改 -->
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <!-- 送出按鈕 -->
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
