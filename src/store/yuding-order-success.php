<?php
	require('../config/index_config.php');
	$oid = $_GET['oid'];
	check($oid);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>预订提交成功</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<link href="../styles/extend/store/yuding-order-success.css" type="text/css" rel="stylesheet" />
		<link href="../styles/base.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div class="head">
			<img src="../images/return.png" style="width:23px;float:left;margin-left:20px;" onClick="javascript:history.back(-1)"><span style=";">预定提交成功</span><span style="width:40px;float:right;">&nbsp;</span>
		</div>
		<div style="padding-bottom:48px;"></div>
		<img src="../images/duihao.png" style="width:30%;margin:20px 35%;">
		<div class="font">
			<p>预订提交成功，请20分钟之内店。否则商家有权取消本次预定</p>
		</div>
		<a href="../order/order_detail.php?oid=<?echo $oid;?>">
		<div class="btn">
			查看我的预定
		</div>
		<a href="../index">
		<div class="btn1">
			返回门店
		</div>
	</a>
	</body>
</html>
