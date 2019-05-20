<?php
    session_start(); 

    // 登陆状态判定
	if($_SESSION['Passed'] == false){
		header('content-type:text/html;charset=utf-8');
        $url='exit.php';
		echo "<script>window.location.href='$url';</script>;"; 
	}

    // 创建与message库的接口
    include ('Class_Messages.php');

    // 密码修改申请
    $mes_password = new Messages();
    $mes_password->get_password_change_message(1);

    // 操作记录信息
    $mes_operator = new Messages();
    if(!$mes_operator->get_operation_record(1))
    echo "adsad <br>";
    
    // 商品发布申请
    $mes_good = new Messages();
    $mes_good->get_good_post_message(1);
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
					<a href="inbox.php" title="Your Messages">
						<span class="tab_label">消息管理</span>
						<span class="tab_info">Your Messages</span>
					</a>
				</li>
				<li class="i_32_tables">
					<a href="goods_table.php" title="Some Rows">
						<span class="tab_label">商品管理</span>
						<span class="tab_info">Goods</span>
					</a>
				</li>
				<li class="i_32_forms">
					<a href="account_table.html" title="Some Fields">
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
				
				
				<div class="g_12">
						<div class="widget_header">
							<h4 class="widget_header_title wwIcon i_16_tooltip">操作记录</h4>
						</div>
						<div class="widget_contents noPadding twCheckbox">
							<table class="tables datatable noObOLine">
								<thead>
									<tr>
										<th>
											<input type="checkbox" class="simple_form tMainC">
										</th>
										<th>操作类型</th>
										<th>执行者姓名</th>
										<th>操作对象</th>
										<th>操作结果</th>
										<th>操作时间</th>
									</tr>
								</thead>
								<tbody>
<?php
    while($mes_operator->fetch_next_message()){
?>

                                    <tr class="status_open">
											<td><input type="checkbox" class="simple_form"></td>
											<td><?php echo $mes_operator->get_message_text() ;?></td>
											<td><?php echo $mes_operator->get_message_subject() ;?></td>
											<td><?php echo $mes_operator->get_message_object() ;?></td>
											<td><?php echo $mes_password->get_message_result() ;?></td>
											<td><?php echo $mes_password->get_message_date() ;?></td>
									</tr>

<?php
    }
?>
								</tbody>
							</table>
						</div>
					</div>
                    
                
                </div>
					
                    </div>
    </div>
</body>
</html>