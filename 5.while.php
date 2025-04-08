<?php
   # 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   # 從查詢結果 $result 中取出一筆資料，存到變數 $row 裡
   while ($row=mysqli_fetch_array($result)) {
    #輸出該筆資料的 "id" 和 "pwd" 欄位值，用空格隔開，<br>換行
     echo $row["id"]." ".$row["pwd"]."<br>";
   } 
?>
