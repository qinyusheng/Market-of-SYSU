<?php
    session_start(); 

    // 登陆状态判定
	if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;"; 
    }
    
    // 商品类型列表
    $type = array('书籍','电子产品','学习用品','生活用品','其他');

    // 声明与Goods库的接口变量
    include ('Class_Goods.php');
    $good = new Goods();
    
    // 打印出页面头部
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>个人空间</title>
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="Javascript/Flot/excanvas.js"></script>
	<![endif]-->
	<!-- The Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700" rel="stylesheet">
	<!-- The Main CSS File -->
	<link rel="stylesheet" href="admin/CSS/style.css">
	<!-- jQuery -->
	<script src="Javascript/jQuery/jquery-1.7.2.min.js"></script>
	<!-- Flot -->
	<script src="Javascript/Flot/jquery.flot.js"></script>
	<script src="Javascript/Flot/jquery.flot.resize.js"></script>
	<script src="Javascript/Flot/jquery.flot.pie.js"></script>
	<!-- DataTables -->
	<script src="Javascript/DataTables/jquery.dataTables.min.js"></script>
	<!-- ColResizable -->
	<script src="Javascript/ColResizable/colResizable-1.3.js"></script>
	<!-- jQuryUI -->
	<script src="Javascript/jQueryUI/jquery-ui-1.8.21.min.js"></script>
	<!-- Uniform -->
	<script src="Javascript/Uniform/jquery.uniform.js"></script>
	<!-- Tipsy -->
	<script src="Javascript/Tipsy/jquery.tipsy.js"></script>
	<!-- Elastic -->
	<script src="Javascript/Elastic/jquery.elastic.js"></script>
	<!-- ColorPicker -->
	<script src="Javascript/ColorPicker/colorpicker.js"></script>
	<!-- SuperTextarea -->
	<script src="Javascript/SuperTextarea/jquery.supertextarea.min.js"></script>
	<!-- UISpinner -->
	<script src="Javascript/UISpinner/ui.spinner.js"></script>
	<!-- MaskedInput -->
	<script src="Javascript/MaskedInput/jquery.maskedinput-1.3.js"></script>
	<!-- ClEditor -->
	<script src="Javascript/ClEditor/jquery.cleditor.js"></script>
	<!-- Full Calendar -->
	<script src="Javascript/FullCalendar/fullcalendar.js"></script>
	<!-- Color Box -->
	<script src="Javascript/ColorBox/jquery.colorbox.js"></script>
	<!-- Kanrisha Script -->
	<script src="Javascript/kanrisha.js"></script>
</head>
<body>

<div class="wrapper contents_wrapper">

<div class="contents">
        <div class="grid_wrapper">

            <div class="g_6 contents_header">
                <h3 class="i_16_message tab_label"><?php echo $_SESSION['user_name'];?> 的个人空间 </h3>
                <!-- <div><span class="label">操作记录、商品发布申请、密码修改申请</span></div> -->
            </div>
            <div class="g_6 contents_options">
                <div class="simple_buttons">
                    <div class="bwIcon i_16_help"><a href="index.php">返回主页</a></div>
                </div>
            </div>

            <div class="g_12 separator"><span></span></div>
				<div class="g_12">
						<div class="widget_header">
							<h4 class="widget_header_title wwIcon i_16_tooltip">发布过的商品</h4>
						</div>
						<div class="widget_contents noPadding twCheckbox">
							
							<table class="tables datatable noObOLine" style="text-align:center" >
								<thead>
									<tr>
										<th>
											编号
										</th>
										<th>商品类型</th>
										<th>商品名称</th>
										<th>商品发布时间</th>
										<th>商品截至时间</th>
										<th>商品下架</th>
									</tr>
								</thead>
<?php
    // 开始打印表格内容
    $id = 0;
    $good->find_good_by_user_name($_SESSION['user_name']);
    while($good->fetch_next_good()){
        $id ++;
?>

<tbody>
    <tr class="status_open">
	    <td><?php echo $id;?></td>
		<td><?php echo  $type[$good->get_type_id()];?></td>
		<td><a href="good_detail.php?good_id=<?php echo $good->get_good_id();?>"><?php echo $good->get_good_name();?></a></td>
		<td><?php echo $good->get_start_time();?></td>
		<td><?php echo $good->get_end_time();?></td>
		<td><a href="delete_good.php?way=1&good_id=<?php echo $good->get_good_id();?>">下架</a></td>
	</tr>
</tbody>

<?php
    }
    // 打印末尾
?>

</tr>
								</tbody>
								
							</table>
						</div>	
                </div>
            </div>
					
		</div>
		
	</div>
</body>
</html>