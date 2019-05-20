<!-- 商品详细信息页面 -->

<!-- 
    商品种类：0——书籍 1——电子产品 2——学习工具 3——生活用品 4——其他
-->

<?php
	 //开启会话
	 session_start(); 

	 // 登陆状况判定
	 if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;";
		exit();
	 }

   // 声明一个Goods类对象来链接数据库
   include('Class_Goods.php');
   $good = new Goods();
   
   // 获取商品信息
   if(!isset($_GET['good_id'])){
        echo "获取失败"; 
   }else{
        $good->find_good_by_id(intval($_GET['good_id']));
        // 增加点击次数
        $good->be_click();
        // 打印出商品信息
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>“黑市”好物-物品1</title>
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
	height:30px;
	background-color:#9F4300;
	color: #FFFFFF;
	filter:opacity(70%);
	padding-top: 2px;
	padding-left:70%;
	font-size: 24px;
	font-family:  "方正寂地简体";
	}
#banner{
	width: 1280px;
	height: 600px;
	margin-left: auto;
	margin-right: auto;
		}
		
#menu2{
	width: 1280px;
	height: 30px;
	margin-right: auto;
	margin-left: auto;
			
		}
.m2down ul {
    list-style-type: none;
    padding: 0;
    overflow: hidden;
	margin-left: auto;
	margin-right: auto;
    }
.m2down ul li{
			float: left;
		}
		
.m2btn {
    background-color: #fcd6c2;
    color:#D72709;
    height: 30px;
	width: 256px;
    font-size: 16px;
	font-family: "方正喵呜体";
    border: none;
    cursor: pointer;
	padding-left: 16px;
	margin-left: auto;
	margin-right: auto;
	
	
}		

#content1{
	width: 1280px;
	height: 310px;	
	margin-left: auto;
	margin-right: auto;
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
	z-index: 3;
	}

/* #menu{
	background-color: #00262F;
	filter: opacity(90%);
	height: 50px;
	width: 1280px;
	color: #FFEBD7;
	margin-left: auto;
	margin-right: auto;
	} */

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

img {
    margin-left: auto; 
    margin-right:auto; 
    display:block;
}

.feature_section{
	float:left;
	width:100%;
	background:rgba(255, 255, 255, 0.6);
	padding:80px 0 80px 0;
	z-index: 1;
	}

.feature_section .leftside{
	float:left;
	width:390px;
	margin:0 0 0 35px;
	}

.feature_section .leftside img{
	float:right;
    width:500px;
	}

.feature_section .rightside{
	float:right;
	width:587px;
	margin:0 35px 0 0;
	z-index: 2;
	}

	.container{
	display:table;
	margin:0 auto 0 auto;
	width:1100px;
	position:relative;
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
	color: 	#FF0000;
	text-decoration: none;
}
.link2:visited{
	color: 	#FF0000;
	text-decoration: none;
}



</style>

</head>

<body>
	<div class="head1">
		<a href="index.php">
				<button class="butn">黑市首页</button></a>
				你好，<?php echo $_SESSION['user_name']; ?>  	
				<a class="link2" href="">[注销]</a>
			<span style="color: #FFFFFF;padding-left:50%;font-size: 24px;">Let's start a shopping!</span>
		</div>

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
  <a href="good_post.html">我的商品</a>
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
	<div class="feature_section" id="features">
		<div class="container">
		
						
						<div class="leftside">
						<img src="<?php echo $good->get_good_image();?>" alt=""  class="wow bounceInLeft animated" data-wow-duration="2s" data-wow-offset="300" data-wow-delay="0.2s" />
						</div>
						
						
				<div class="rightside">
						
						<h2><?php echo $good->get_good_name();?></h2>
						<!-- <p>abcdefgh</p> -->
						<br>
						<!-- <h2>商品价格</h2>
						<p>123456798</p> -->
						<p style="font-size: 13px; "><?php echo $good->get_good_describe();?></p>
						<br>
						<h2 style="color:red;">价格：	￥ <?php echo $good->get_good_price();?></h2>
						<br>
						<HR style="FILTER: alpha(opacity=10%,finishopacity=0,style=3) " width="100%" color=#deb887 SIZE=3 >
							<br>
							<br>
						<p style="font-size: 13px; ">发布时间：		<?php echo $good->get_start_time();?></p>
						<br>
						<p style="font-size: 13px; ">新旧程度：	    <?php echo $good->get_old_new();?></p>
						<br>
						<p style="font-size: 13px; ">卖家名称：	    <?php echo $good->get_good_owner();?></p>
						<br>
						<p style="font-size: 13px; ">联系方式：		<?php echo $good->get_good_contact();?></p>
                        <br>
                        <p style="font-size: 13px; ">商品所在地：   <?php echo $good->get_good_address();?></p>
                        <br>
						
					
				</div>			
		
		</div>
		</div>

</body>
</html>
<?php
   }
?>