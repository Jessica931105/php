<?php
    error_reporting(0); // 關閉錯誤訊息顯示，避免顯示系統錯誤給使用者
    session_start();  // 啟用 session 功能，用於登入驗證
    // 檢查使用者是否登入
    if (!$_SESSION["id"]) {
        // 若尚未登入，顯示提示訊息
        echo "please login first";
        // 三秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 若已登入，顯示新增佈告的表單畫面
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
            <!-- 表單開始：送出後會 POST 到 23.bulletin_add.php -->
                <form method=post action=23.bulletin_add.php>
                    <!-- 標題輸入欄位 -->
                    標    題：<input type=text name=title><br>
                    <!-- 內容輸入區域 --
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br>
                    <!-- 佈告類型選擇（單選） -->
                    佈告類型：<input type=radio name=type value=1>系上公告 
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    <!-- 發布時間選擇 -->
                    發布時間：<input type=date name=time><p></p>
                    <!-- 送出與清除按鈕 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
