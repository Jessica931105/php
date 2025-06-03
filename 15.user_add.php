<?php

error_reporting(0);// 關閉錯誤訊息的顯示，避免將錯誤資訊曝光給使用者
session_start();// 啟動 session 機制，用於檢查使用者是否已登入
// 檢查 session 中是否有 "id"，也就是確認使用者是否已登入
if (!$_SESSION["id"]) {
    echo "請登入帳號";// 提示尚未登入
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 3秒後跳轉回登入頁面
}
else{    

   // 建立資料庫連線（連接到 db4free.net 的 immust 資料庫）
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   // 建立 SQL 新增語法，將使用者輸入的帳號與密碼插入到 user 表格中 
   #mysqli_query() 從資料庫查詢資料
   #新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql="insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   // 嘗試執行 SQL 指令
   if (!mysqli_query($conn, $sql)) {
     echo "新增命令錯誤";// 如果新增失敗，顯示錯誤訊息
   }
   else{
     echo "新增使用者成功，三秒鐘後回到網頁";// 成功訊息
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 3 秒後跳轉回使用者列表頁
   }
}
?>
