<?php
    $server="localhost";//主机
    $db_username="root";//数据库用户名
    $db_password="qin";//数据库密码

    $con = mysqli_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("we can't connect bro".mysqli_error($con));//如果链接失败输出错误 die()退出脚本
    }
    
    mysqli_select_db($con , 'test');//选择数据库(数据库名)
?>