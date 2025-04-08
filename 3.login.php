<?php 
    #帳號是否為 "john" 且密碼為 "john1234"
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234"))
    #如果帳號和密碼都正確，顯示「登入成功」
        echo "登入成功";
    else#否則顯示「登入失敗」
        echo "登入失敗";
?>
 