<?php
    error_reporting(0);// 關閉錯誤訊息顯示，避免輸出錯誤資訊給使用者
    session_start(); // 啟用 session 功能，用來判斷使用者是否已登入
   // 檢查是否有登入（是否有 session 變數 id）
    if (!$_SESSION["id"]) {
        echo "請登入帳號";  // 若未登入，顯示提示訊息
        // 三秒後自動導回登入頁面 2.login.html
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        // 使用者已登入，開始執行刪除佈告動作
        // 連接資料庫，使用指定的帳號密碼與資料庫名稱
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 組合刪除佈告的 SQL 語句，根據 GET 參數中的 bid 指定刪除目標
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        // 執行刪除命令，判斷是否成功
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";// 若刪除失敗，顯示錯誤訊息
        }else{
            echo "佈告刪除成功";// 刪除成功時顯示成功訊息
        }
        // 不論成功或失敗，三秒後自動導回佈告列表頁面 11.bulletin.php
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
