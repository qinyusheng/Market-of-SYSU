<!-- 利用$_POST从表单中获取数据，并储存到数据库中 -->

<?php
    //开启会话
	session_start(); 

    // 判断登陆状态
    if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;";
		exit();
	}

    // 创建一个Files类对象来进行图片保存
    include('Class_Files.php');
    $file = new Images();
    // 创建一个Goods类对象来与数据库Goods连接
    include('Class_Goods.php');
    $good = new Goods();

    // 检查是否顺利提交全部内容
    $error = 0;
    if(!isset($_POST['good_name'])){
        $error = 1;
    }elseif(!isset($_POST['good_price'])){
        $error = 2;
    }elseif(!isset($_POST['good_type'])){
        $error = 3;
    }elseif(!isset($_POST['good_contact'])){
        $error = 4;
    }elseif(!isset($_POST['old_new'])){
        $error = 5;
    }elseif(!isset($_POST['good_address'])){
        $error = 6;
    }elseif(!isset($_POST['good_descript'])){
        $error = 7;
    }elseif(!isset($_POST['post_time'])){
        $error = 8;
    }elseif(!isset($_FILES['good_image'])){
        $error = 9;
    }

    function print_error($error){
        
    }
/* 
    function set_time($good , $post_time){
        $start_time = time();
        $end_time = $start_time + $post_time*24*3600;
        $good->set_end_time($end_time);
        $good->set_start_time($start_time);
    } */

    // 如果没有出错，将表单上的数据插入数据库
    if($error == 0 ){    
        //读取数据到$good变量中
        $good->set_good_name($_POST['good_name']);
        $good->set_good_price($_POST['good_price']);
        $good->set_type_id($_POST['good_type']);
        $good->set_good_contact($_POST['good_contact']);
        $good->set_old_new($_POST['old_new']);
        $good->set_good_address($_POST['good_address']);
        $good->set_good_describe($_POST['good_descript']);

        //计算开始和截止的时间
        // 获取当前时间戳
        $start_time = time();
        // 计算结束时的时间戳
        $end_time = $start_time + $_POST['post_time'] *24*3600;
        // 将时间戳转化为具体时间形式保存进数据库种
        $good->set_end_time(date("Y-m-d H:i:s",$end_time));
        $good->set_start_time(date("Y-m-d H:i:s",$start_time));

        // 将图片保存至本地
        $img_address = $file->find_address();
        if(file_exists($_FILES['good_image']['tmp_name'])){
            move_uploaded_file($_FILES['good_image']['tmp_name'] , $img_address);
            $good->set_good_image($file->get_position());
        }else{
            $error = 10;
        }

        // 获取发布者的信息(待修改)
        if(isset($_SESSION['user_name'])){
            $good->set_good_owner($_SESSION['ID']);
        }else{
            $good->set_good_owner('测试');
        }

        // 处理发布时长过长的商品（待完善）
        $good->set_good_state(1);
    }
    if(!$good->insert_goods()){
        $error = 10;
    }

/*     echo('错误是：'.$error.'<br>');
    echo('商品名称：'.$good->get_good_name().'<br>');
    echo('商品价格：'.$good->get_good_price().'<br>');
    echo('商品类型：'.$good->get_type_id()).'<br>';
    echo('商家联系信息：'.$good->get_good_contact().'<br>');
    echo('商品新旧程度：'.$good->get_old_new().'<br>');
    echo('商品所在地：'.$good->get_good_address().'<br>');
    echo('商品描述：'.$good->get_good_describe().'<br>');
    echo('商品发布时长：'.$_POST['post_time'].'<br>');
    echo('商品开始发布时间：'.$good->get_start_time().'<br>');
    echo('现在的时间是：'.time().'<br>'); */
    //如果成功就显示成功页面，失败就显示失败页面
    if($error == 0){
        echo "<script>alert('商品发布成功')</script>";

        header('content-type:text/html;charset=utf-8');
        $url='index.php';
        echo "<script>window.location.href='$url';</script>;";
    }else{
        echo "<script>alert('商品发布失败')</script>";
        
        header('content-type:text/html;charset=utf-8');
        $url='good_post.php';
        echo "<script>window.location.href='$url';</script>;";
    }
?>