<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0);// 關閉錯誤顯示，避免讓使用者看到系統錯誤訊息
        session_start(); // 啟用 session 功能，用於檢查是否已登入
        // 檢查 session 中是否有登入資訊
        if (!$_SESSION["id"]) {
            echo "請登入帳號";// 若未登入，提示訊息
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 3 秒後跳轉到登入頁面
        }
        else{   
            // 若已登入，開始顯示使用者管理功能
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";// 表格表頭，顯示帳號與密碼欄位

            // 連線到遠端資料庫
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            // 查詢所有使用者資料
            $result=mysqli_query($conn, "select * from user");
            // 用迴圈將每筆使用者資料列出來
            while ($row=mysqli_fetch_array($result)){
                // 每列提供「修改」與「刪除」連結，並顯示帳號與密碼
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 表格結尾
            echo "</table>";
        }
    ?> 
    </body>
</html>
