<?php
    #啟動 Session，這行一定要放在最上面
    session_start();
    #檢查 Session 變數 "counter" 是否尚未存在
    if (!isset($_SESSION["counter"]))
    #第一次瀏覽，將計數器設為 1
        $_SESSION["counter"]=1;
    else
    #否則，每次重新整理就讓計數器加 1
        $_SESSION["counter"]++;
    #顯示目前的瀏覽次數
    echo "counter=".$_SESSION["counter"];
    #顯示一個超連結，點下去會前往 9.reset_counter.php 清除計數器
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>

   

    