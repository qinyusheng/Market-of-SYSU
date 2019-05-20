<?php
	//开启会话
	session_start(); 

    // 登陆状态判定
	if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;"; 
	}

    // 声明一个Goods对象作为于Goods库的接口
    include('Class_Goods.php');
    $good = new Goods();

    // 创建一个数组来装打印在商品元素对应得样式
    $style = array("jane", "mike", "john");
    // 类型ID对应的名称
    $good_type = array('书籍','电子产品','学习用品','生活用品','其他');

    // 打印出主页中除了商品之外得部分
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>中大"黑市"</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/css-market.css">
<link rel="stylesheet" href="css/button.css">
<style  type="text/css">
body
{
	background-image:url(img/盐系星球背景图.jpg); 
	height:500px;
	margin: 0px
}
#head{
	height:26px;
	background-color:#9F4300;
	color: #FFFFFF;
	filter:opacity(70%);
	padding-top: 2px;
	padding-left:70%;
	font-size: 20px;
	font-family:  "方正寂地简体";
	}
#banner{
	width: 1280px;
	height: 480px;
	margin-left: auto;
	margin-right: auto;
		}
#content{
	width: 1280px;
	height: 1600px;	
	margin-left: auto;
	margin-right: auto;
	background-color: #FFFFFF;	
		}

#content1{
	width: 1280px;
	height: 650px;	
	margin-left: auto;
	margin-right: auto;
	z-index: 1;
		}

#pic{
    background-color: #FFFFFF;
	float: right;
	width: 590px;
	height: 600px;
			
		}
#content2{
	text-align: center;
	width: 1280px;
	height: 650px;
	margin-left: auto;
	margin-right: auto;
	
	
		}
.word{
	width: 630px;
	height: 600px;
	float: left;
	padding: 0px;
			}
.niu{
	width: 630px;
	height: 600px;
	float: left;
	margin: 0;
	padding: 0;
			
		}

#content3{
	text-align: center;
	width: 1280px;
	height: 650px;
	margin-left: auto;
	margin-right: auto;
			
		}
#footer{
	background-color:#9F4300;
	filter:opacity(70%);
	height: 300px;
	margin: 0;
	
			}
#info{
	height: 400px;
	color: #E6A3A4;
	float: left;
	margin-left: 350px;
	position: absolute;
	font-family: "方正喵呜体";
	font-size: 20px;
		}
#logo{
	height: 400px;
	float: left;
	margin-left: 1200px;	
	position: absolute;
		}
#menu{
	background-color: #00262F;
	filter: opacity(90%);
	height: 50px;
	width: 1280px;
	color: #FFEBD7;
	margin-left: auto;
	margin-right: auto;
	}

.dropdown ul {
    list-style-type: none;
    padding: 0;
    overflow: hidden;
	margin-left: auto;
	margin-right: auto;
    }
.dropdown ul li{
			float: left;
		}
.dropbtn {
    background-color: #00262F;
    color:#A2D2D5;
    height: 50px;
	width: 236px;
    font-size: 20px;
	font-family: "方正喵呜体";
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}


.dropdown-content {
    display: none;
    position: absolute;
    background-color: #C3E8E5;
	filter: opacity(90%);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}


.dropdown-content a {
    color:#003144;
	font-family: "方正喵呜体";
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}


.dropdown-content a:hover {background-color: #78ABBB}


.dropdown:hover .dropdown-content {
    display: block;
}


.dropdown:hover .dropbtn {
    background-color: #C9E8F9;
}

.head1{
		height:30px;
	background-color:#9F4300;
	filter:opacity(70%);
	color:#FFFFFF;
	/* color: #FFFFFF;
	padding-top: 2px;
	padding-left:70%;
	font-size: 24px;
	font-family:  "方正寂地简体"; */
}

.link1:link{
	color: rgb(240, 3, 7);
	text-decoration: none;
}
.link1:visited{
	color: rgb(240, 3, 7);
	text-decoration: none;
}
.link2:link{
	color: 	#EEAD0E;
	text-decoration: none;
}
.link2:visited{
	color: 	#EEAD0E;
	text-decoration: none;
}
    </style>
</head>

<body>
	<div class="head1">
		<a href="index.php">
				<button class="butn">黑市首页</button></a>
				你好，<?php echo $_SESSION['user_name'];?>  	
				<a class="link2" href="exit.php">[注销]</a>
			<span style="color: #FFFFFF;padding-left:50%;font-size: 24px;">Let's start a shopping!</span>
		</div>
<div id="banner"><img src="黑市/7.jpg" width="1280px" height="480px" ></div>

<div id="menu">
	<ul>
	<div class="dropdown">
  <button class="dropbtn">“黑市”简介</button>
  <div class="dropdown-content">
    <a href="about1.html">“黑市”功能</a>
    <a href="about2.html">”黑市“发源</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">个人中心</button>
  <div class="dropdown-content">
    <a href="talk.html">我的私信</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">卖家中心</button>
  <div class="dropdown-content">
  <a href="good_post.html">商品发布</a>
  <a href="my_goods.php">我的商品</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">“黑市”好物</button>
  <div class="dropdown-content">
  <a href="type_goods.php?type=书籍">书籍</a>
    <a href="type_goods.php?type=电子产品">电子产品</a>
    <a href="type_goods.php?type=学习用品">学习用品</a>
    <a href="type_goods.php?type=生活用品">生活用品</a>
    <a href="type_goods.php?type=其他">其他</a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">联系我们</button>
  <div class="dropdown-content">
    <a href ="#footer">联系我们</a>
	<a href="contact.html">我要投诉</a>
  </div>
</div>
</ul>
</div>
<?php
    // 开始打印出商品信息
    // 获取九个最新商品的信息
    $style_id = 0;
    if($good->find_new_goods(12)){
        // 如果成功了,就获取第一个商品的信息
        while($good->fetch_next_good()){
            if($style_id % 3 == 0){
                ?>
                <div id="three-div" class="clearfix">
                <?php
            }

?>
	<div id="<?php echo $style[$style_id%3]; ?>">
		<a class="link1" href="good_detail.php?good_id=<?php echo $good->get_good_id(); ?>">
			<img src="<?php echo $good->get_good_image(); ?>" alt="中大黑市" height="200">
			<h2><?php echo $good->get_good_name(); ?></h2>
		</a>
			<span>￥ <?php echo $good->get_good_price(); ?></span>
			<p><?php echo mb_substr($good->get_good_describe(), 0 ,35 , "utf-8"); 
				if(mb_strlen($good->get_good_describe()) >=35){
					echo "……";
				}?></p>
        </div>
<?php        
         if($style_id %3 == 2){
            ?>
</div>
<?php
        } 
        $style_id ++;
    }
    {
?>
            </div>
<?php
    }
    }else{
        echo "无法获取需要的最新商品";
    }
?>