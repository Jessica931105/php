<?php
    error_reporting(0);// 關閉錯誤訊息顯示，避免系統錯誤訊息顯示給使用者
    session_start();// 啟用 session 功能，用來確認使用者是否登入
    // 檢查使用者是否登入
    if (!$_SESSION["id"]) {// 顯示尚未登入的提示訊息
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 三秒後跳轉回登入頁面
    }
    else{
        // 已登入，開始執行新增資料
        // 連接到資料庫（遠端的 db4free.net）
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 建立新增佈告的 SQL 指令，將表單送來的資料插入 bulletin 資料表
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        // 執行 SQL 指令，判斷是否成功
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";// 新增失敗顯示錯誤訊息
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";// 新增成功提示訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 三秒後跳轉回佈告列表頁面
        }
    }
?>
