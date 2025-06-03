<?php

    error_reporting(0);// 關閉所有錯誤訊息（正式環境可考慮開啟以方便除錯）
    session_start(); // 啟用 session，讓頁面可以存取登入資訊
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";// 若尚未登入，顯示提示訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 三秒後導回登入頁面
    }
    else{ 
        // 若已登入，開始進行資料處理
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 若已登入，開始進行資料處理
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            echo "修改錯誤";// 若執行失敗，顯示錯誤訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 三秒後導回佈告欄列表頁
        }else{
            echo "修改成功，三秒鐘後回到佈告欄列表";// 若成功，顯示成功訊息
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";// 三秒後導回佈告欄列表頁
        }
    }

?>
