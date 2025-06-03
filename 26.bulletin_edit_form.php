<?php
    error_reporting(0);// 關閉錯誤訊息顯示
    session_start();// 啟用 session 功能
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {// 若未登入，顯示提示訊息
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";// 三秒後導回登入頁面
    }
    
    else{
        // 若已登入，開始處理佈告資料的讀取與表單顯示
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 從資料庫中根據 bid 取得該筆佈告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        // 取得查詢結果的資料列
        $row=mysqli_fetch_array($result);
        // 根據資料中的 type 欄位來決定 radio button 的預設勾選項目
        $checked1="";
        $checked2="";
        $checked3="";
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        // 顯示 HTML 表單，填入資料庫中的現有資料供使用者修改
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                <!-- 顯示佈告編號，同時透過 hidden 欄位將 bid 傳給下一支程式 -->
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    <!-- 標題欄位，預設值為資料庫中的原始標題 -->
                    標    題：<input type=text name=title value={$row['title']}><br>
                    <!-- 內容欄位，預設值為資料庫中的原始內容 -->
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    <!-- 類型欄位，使用 radio，依據原始類型設定預設勾選 -->
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    <!-- 發布時間欄位，預設值為原始資料中的日期 -->
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <!-- 送出與清除按鈕 -->
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
