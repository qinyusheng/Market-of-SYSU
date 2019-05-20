<?php
    // 创建一个Goods与数据库连接
    include ('Class_Goods.php');
    $good = new Goods();

    // 删除商品
    $good->delete_good_by_id($_GET['good_id']);

    header('content-type:text/html;charset=utf-8');
    if($_GET['way'] == 1){
        $url = 'my_goods.php';
    }
    echo "<script>window.location.href='$url';</script>;";
?>