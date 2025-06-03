<?php
    error_reporting(0);// 關閉錯誤訊息的顯示，避免讓使用者看到系統錯誤細節
    session_start();// 啟用 session 功能，確認使用者是否登入
    // 檢查 session 中是否有登入資訊
    if (!$_SESSION["id"]) {
        echo "請登入帳號";// 若尚未登入，顯示提示訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 若已登入，繼續執行刪除動作
        // 連接到遠端資料庫（db4free.net 上的 immust 資料庫）
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 建立 SQL 指令，刪除符合 id 的使用者資料（從網址列取得 GET 參數）
        $sql="delete from user where id='{$_GET["id"]}'";
        // 執行 SQL 指令
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";// 若執行失敗，顯示錯誤訊息
        }else{
            echo "使用者刪除成功"; //成功刪除使用者
        }// 無論成功與否，3 秒後跳轉回使用者清單頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
