<?php
 require('config/index_class1.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css"/>
        <link href="assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
			<script src="assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="js/H-ui.js"></script>
        <script type="text/javascript" src="js/H-ui.admin.js"></script>
        <script src="assets/layer/layer.js" type="text/javascript" ></script>
        <script src="assets/laydate/laydate.js" type="text/javascript"></script>
<title>用户列表</title>
</head>

<body>
	<div class="add_menber" id="add_menber_style" style="">
		<form action="zo/admin_update.php" method="post">
   <?php



			include('config/conn.php');//用户名获取

		$id=$_GET['id'];
		if($id==null){
		exit('<script>alert(\'参数传递有误！\');</script>');
		}

			mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM admin where id = '$id' ");
	while($row = mysql_fetch_array($result))
 	{
 		echo '
    <ul class=" page-content" style="margin-top:40px;">
     <li><label class="label_name">用户名：</label><span class="add_name">
		 <input type="text" class="text_add" value="';echo $row['admin_name']; echo '" name="admin_name"/>
		 <input type="text" value="';echo $row['id']; echo '" name="admin_id" style="display:none;"/>
		 </span><div class="prompt r_f"></div></li>
	<li><label class="label_name">密码：</label><span class="add_name"><input type="text" value="';echo $row['admin_password']; echo '" name="admin_password" class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">性别：</label><span class="add_name"><input type="text" value="';echo $row['admin_sex']; echo '" name="admin_sex" class="text_add"/></span><div class="prompt r_f"></div></li>
      <li><label class="label_name">真实姓名：</label><span class="add_name"><input name="admin_truename" type="text" value="';echo $row['admin_truename']; echo '" class="text_add" /></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">微信号：</label><span class="add_name"><input name="admin_weixin" type="text" value="';echo $row['admin_weixin']; echo '" class="text_add" /></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">移动电话：</label><span class="add_name"><input name="admin_tel" type="text" value="';echo $row['admin_tel']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">电子邮箱：</label><span class="add_name"><input name="admin_email" type="text" value="';echo $row['admin_email']; echo '" class="text_add"/></span><div class="prompt r_f"></div></li>

        <li><label class="label_name">等级：</label>
				<span class="add_name">
					<select name="admin_dept" style="width:162px;margin-left:10px;>

					<option value="1">普通会员</option>
						'; admin_dept_list('3',$row['admin_dept']); echo '
					</select>
				</span><div class="prompt r_f">
				</li>

    </ul>
 </div>';
}?>
 	<div style="clear:both;">
 <div class="layui-layer-btn"><button class="layui-layer-btn0" type="submit" style="padding:7px 14px;">提交</button><a class="layui-layer-btn1">取消</a></div>
</body>
</html>
