<?php
   #建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
  #預設 $login 為 FALSE，表示尚未登入成功
   $login=FALSE;
  #使用 while 逐筆從查詢結果中取出資料
   while ($row=mysqli_fetch_array($result)) {
    # 如果表單輸入的帳號密碼符合某一筆資料
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
      #登入成功
       $login=TRUE;
     }
   } 
   #登入成功的處理
   if ($login==TRUE) {
    #啟動 Session
    session_start();
    #// 將登入的帳號存入 Session
    $_SESSION["id"]=$_POST["id"];
    echo "登入成功";
    # 秒後自動導向到 11.bulletin.php
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }

  else{
    #登入失敗的處理
    echo "帳號/密碼 錯誤";
    #3 秒後自動跳回登入頁面 2.login.html
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
  