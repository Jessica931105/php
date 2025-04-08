<?php
    #啟動 Session
    session_start();
    #移除 "counter" 這個 Session 變數，達到重置計數器的效果
    unset($_SESSION["counter"]);
    #顯示訊息：計數器已重置
    echo "counter重置成功....";
    #使用 <meta> 標籤進行頁面自動重定向，2秒後跳轉到 8.counter.php 頁面
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";

?>
 