<?php
 include('../config/conn.php');//链接数据库
 header("Content-Type: text/html; charset=utf8");
error_reporting(0);
$store_name = $_POST['store_name'];
$store_place = $_POST['store_place'];
$store_phone = $_POST['store_phone'];
$admin_name = $_POST['admin_name'];
$sort_id = '1';
$sql2="select * from admin where admin_name = '$admin_name'";//查询语句
     $res=mysql_query($sql2);//执行查询
    $count=mysql_num_rows($res); 
    if($count > 0){
        exit('<script>alert(\'已经存在相同的商家账号，请重新输入！\');history.back();</script>');
    }
$sql="select * from store_sort where id = '$sort_id'";//查询语句
     $res=mysql_query($sql);//执行查询
     while($row=mysql_fetch_assoc($res)){
         $rows[]=$row;//接受结果集
     }
     foreach($rows as $key=>$v){
     	$stops_time = $v['stop_time'];
     	$dept_body = $v['dept_body'];
     	}
     	$stop_time = date('Y/m/d', strtotime("+{$stops_time} days"));
  $admin_password = $_POST['admin_password'];
 
	//上传图片
	
  $q="insert into store_setting(store_id,store_name,store_place,store_phone,status,stop_time,dept,sort) values (null,'$store_name','$store_place','$store_phone','1','$stop_time','$dept_body','$sort_id')";//向数据库插入表单传来的值的sql
  	$re=mysql_query($q,$con);//执行sql
    $getID=mysql_insert_id();//获取插入数据的id
    $s="insert into admin(id,store_id,admin_name,admin_password,admin_tel,time,admin_type) values (null,'$getID','$admin_name','$admin_password','$store_phone','$time','1')";//向数据库插入表单传来的值的sql
      $r=mysql_query($s,$con);//执行sql
      $getIDs=mysql_insert_id();//获取插入数据的id
	if (!$r){
	    	die('Error: ' . mysql_error());//如果sql执行失败输出错误
	}else{
    session_start();
     $_SESSION['admin_id'] = $getIDs;
  $_SESSION['admin_checked'] = true;
        //require('../config/index_class.php');
       //admin_log_add('登陆成功');
      $url  =  "../index.php";
    echo " <script   language = 'javascript'
    type = 'text/javascript' > ";
    echo " window.location.href = '$url' ";
    echo " </script > ";
      exit('<script>alert(\'执行成功！\');history.back();</script>');
	 	 
	}
?>
