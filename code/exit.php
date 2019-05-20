<?php
    //开启会话
	session_start(); 

    if(isset($_SESSION['user_name'])){
        unset($_SESSION['user_name']);
    }
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['uesr_id']);
    }
    if(isset($_SESSION['Passed'])){
        unset($_SESSION['Passed']);
    }

    header('content-type:text/html;charset=utf-8');
    $url= 'log_on.php';
    echo "<script>window.location.href='$url';</script>;";
?>