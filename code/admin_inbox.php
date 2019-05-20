<?
    // 开启会话
    session_start(); 

    // 登陆状态判定
	if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;"; 
    }
    // 打印出html头部
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>中大“黑市”——管理员界面</title>
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="Javascript/Flot/excanvas.js"></script>
	<![endif]-->
	<!-- The Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Oswald|Droid+Sans:400,700" rel="stylesheet">
	<!-- The Main CSS File -->
	<link rel="stylesheet" href="CSS/style.css">
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
	<!-- Change Pattern -->
	<div class="changePattern">
		<span id="pattern1"></span>
		<span id="pattern2"></span>
		<span id="pattern3"></span>
		<span id="pattern4"></span>
		<span id="pattern5"></span>
		<span id="pattern6"></span>
	</div>
	<!-- Top Panel -->
	

	


	<div class="wrapper contents_wrapper">
		
		<aside class="sidebar">
			<ul class="tab_nav">
				<li class="active_tab i_32_inbox">
					<a href="inbox.html" title="Your Messages">
						<span class="tab_label">消息管理</span>
						<span class="tab_info">Your Messages</span>
					</a>
				</li>
				<li class="i_32_tables">
					<a href="tables.html" title="Some Rows">
						<span class="tab_label">商品管理</span>
						<span class="tab_info">Goods</span>
					</a>
				</li>
				<li class="i_32_forms">
					<a href="forms.html" title="Some Fields">
						<span class="tab_label">账户管理</span>
						<span class="tab_info">Account</span>
					</a>
				</li>
			</ul>
        </aside>
        <div class="contents">
			<div class="grid_wrapper">

				<div class="g_6 contents_header">
					<h3 class="i_16_message tab_label">Message</h3>
					<div><span class="label">操作记录、商品发布申请、密码修改申请</span></div>
				</div>
				<div class="g_6 contents_options">
					<div class="simple_buttons">
						<div class="bwIcon i_16_help">已读</div>
					</div>
                </div>
        
        