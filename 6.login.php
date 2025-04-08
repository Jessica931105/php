<?php
   # 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   # 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   # // 先設定 $login 為 FALSE，表示預設是「尚未登入成功」
   $login=FALSE;
   # 用 while 迴圈逐筆讀取資料庫查詢的結果
   while ($row=mysqli_fetch_array($result)) {
    #比對使用者輸入的帳號和密碼是否與目前這一筆資料相同
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
      #如果比對成功，代表登入成功，設 $login 為 TRUE
       $login=TRUE;
     }
   } 
    #檢查是否有登入成功
   if ($login==TRUE)
    #顯示登入成功訊息
     echo "登入成功";
  else
    #顯示登入失敗訊息
     echo "帳號/密碼 錯誤";
?>

   

   
   