<?php
    // 登陆状态判定


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
<title>中大黑市</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/css-market.css">
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

a:link {
	color: #F26264;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #F29495;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    </style>
</head>

<body>
	<div id="head"><a href="first.html">退出当前账号</a></div>
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
  <button class="dropbtn">商品发布</button>
  <div class="dropdown-content">
  <a href="good_post.html">卖家中心</a>
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
		<a href="good_detail.php?good_id=<?php echo $good->get_good_id(); ?>">
			<img src="<?php echo $good->get_good_image(); ?>" alt="中大黑市" width="344" height="230">
			<h2><?php echo $good->get_good_name(); ?></h2>
		</a>
			<span><?php echo $good->get_good_price(); ?></span>
			<p><?php echo $good->get_good_describe(); ?></p>
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