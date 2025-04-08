<?php
#關閉錯誤訊息
    error_reporting(0);
    #啟動 session，用來判斷是否已登入
    session_start();
    #查 session 中是否有 id
    if (!$_SESSION["id"]) {
        echo "請先登入";
        #3 秒後跳轉回登入畫面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        #顯示登入成功訊息與功能選單
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        #連接到資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        #從 bulletin 資料表中撈出所有資料
        $result=mysqli_query($conn, "select * from bulletin");
        #建立 HTML 表格，顯示資料
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        #建立 HTML 表格，顯示資料
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        #結束表格
        echo "</table>";
    
    }

?>


       
      