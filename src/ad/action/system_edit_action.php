<?php
 	  require('../config/index_class.php');
	   header("Content-Type: text/html; charset=UTF8");
    $store_name = $_POST['store_name'];
  	$store_place=$_POST['store_place'];
  	$store_phone=$_POST['store_phone'];
  	$store_price=$_POST['store_price'];
  	$store_wifi=$_POST['store_wifi'];
  	$store_paking=$_POST['store_paking'];
  	$store_showtime=$_POST['store_showtime'];
  	$store_pinglun=$_POST['pinglun'];
  	$beizhu=$_POST['beizhu'];
	  $gg_title=$_POST['gg_title'];
    $gg_body=$_POST['gg_body'];
	  $zuobiao=$_POST['zuobiao'];
  	$time= date("Y-m-d H:i");//获取当前时间
  	if($_FILES["image"]["name"]!=null){

	//上传图片
	move_uploaded_file($_FILES["image"]["tmp_name"],
	"../../upload/" . $_FILES["image"]["name"]);
	$products_img = "../upload/" . $_FILES["image"]["name"];
		update("store_img",$products_img);
}
  	include ('../config/conn.php');//链接数据库
  	function update($name,$val,$sqla){
		 include ('../config/conn.php');//链接数据库
		 global $user;
	 	$sql = "update store_setting set $name = '$val' where store_id = '$user->store_id'";
   		$result = mysql_query($sql);

   	}
   	update("store_name",$store_name,$admin_sql1);
   	update("store_place",$store_place,$admin_sql1);
   	update("store_phone",$store_phone,$admin_sql1);
   	update("store_price",$store_price,$admin_sql1);
   	update("store_wifi",$store_wifi,$admin_sql1);
   	update("store_paking",$store_paking,$admin_sql1);
   	update("store_showtime",$store_showtime,$admin_sql1);
   	update("store_pinglun",$store_pinglun,$admin_sql1);
   	update("beizhu",$beizhu,$admin_sql1);
   	update("gg_title",$gg_title,$admin_sql1);
   	update("gg_body",$gg_body,$admin_sql1);
    update("gg_time",$time,$admin_sql1);
	   update("zuobiao",$zuobiao,$admin_sql1);
   	exit('<script>alert(\'执行成功！\');history.back();</script>');
?>
