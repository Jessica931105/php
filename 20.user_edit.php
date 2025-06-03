<?php

    error_reporting(0);// 關閉錯誤訊息顯示，避免顯示敏感錯誤資訊
    session_start();// 啟用 session 功能，用來確認是否登入
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        echo "請登入帳號";// 未登入者提示訊息
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 3 秒後跳轉回登入頁面
    }
    else{  
        // 已登入者開始執行資料更新
        // 連接到資料庫（db4free.net 的 immust 資料庫）
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 判斷更新是否成功
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";// 如果執行失敗，顯示錯誤訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 3 秒後跳轉回使用者管理頁面
        }else{
            echo "修改成功，三秒鐘後回到網頁";// 若成功，顯示成功訊息
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";// 並在 3 秒後跳轉回使用者管理頁面
        }
        }
    

?>
