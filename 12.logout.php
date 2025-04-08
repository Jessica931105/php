<?php
#啟動 session
    session_start();
    #移除 session 中的 id
    unset($_SESSION["id"]);
    #顯示登出訊息
    echo "登出成功....";
    #3 秒後自動導向回登入頁面 (2.login.html)
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";

?>
 