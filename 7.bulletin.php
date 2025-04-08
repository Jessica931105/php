<?php
    error_reporting(0);
    #建立與資料庫的連線
    #mysqli_connect(伺服器, 帳號, 密碼, 資料庫名稱)
    $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    #從 bulletin 資料表中取出所有資料
    $result=mysqli_query($conn, "select * from bulletin");
    #輸出 HTML 表格的表頭
    echo "<table border=2><tr><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
    #使用 while 逐筆從查詢結果中取資料
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>";
        #顯示佈告編號
        echo $row["bid"];
        echo "</td><td>";
        #顯示佈告類別
        echo $row["type"];
        echo "</td><td>"; 
        #顯示標題
        echo $row["title"];
        echo "</td><td>";
        #顯示佈告內容
        echo $row["content"]; 
        echo "</td><td>";
        #顯示發佈時間
        echo $row["time"];
        echo "</td></tr>";
    }
    #結束表格
    echo "</table>"
?>