<?php
//判断是否登录成功
	require('config/index_class1.php');
	/**if(check_dept('1') == false){
			exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
	}**/
	$type = $_GET['type'];
	check($type);
	$time = $_POST['time'];

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

<div class="page-content clearfix">
    <div id="Member_Ratings">
      <div class="d_Confirm_Order_style">


     <div class="border clearfix search_style">
       <span class="l_f">
        <a href="?type=1" class="btn btn-warning">今日新增</a>
				<a href="?type=2" class="btn btn-warning">本周新增</a>
				<a href="?type=3" class="btn btn-warning">本月新增</a>
      	<a href="?type=4" class="btn btn-warning">本年新增</a>
      	<a href="phpexcel/zo_member_out.php?type=<? echo $type?>&time=$time" id="member_add" class="btn">以下数据导出</a>
       </span>


				 <ul class="search_content clearfix" style="float:right;margin-top:5px;">
					 <form action="" method="post">
					<li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style="margin-left:10px;" name="time"></li>
					<li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li>
				</form>
				 </ul>


     </div>
     <!---->
     <div class="table_menu_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table" style="font-size:12px">
		<thead>
		 <tr>

				<th width="100">会员卡号</th>
				<th width="100">微信昵称</th>
				<th width="120">手机</th>
				<th width="100">真实姓名</th>
				<th width="180">加入时间</th>
				<th width="100">基本余额</th>
				<th width="100">赠送余额</th>
				<th width="100">已消费</th>
				<th width="100">积分</th>
                <th width="100">等级</th>
				<th width="70">状态</th>
				<th width="250">所属门店</th>
			</tr>
		</thead>
	<tbody>
		 <?php if($time == null ){member_list($type); } else{member_list1($time);}     ?>
       <!-- <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>1</td>
          <td><u style="cursor:pointer" class="text-primary" onclick="member_show('李四','member-show.html','10001','500','400')">张三</u></td>
          <td>男</td>
          <td>13000000000</td>
          <td>admin@mail.com</td>
          <td class="text-l">北京市 海淀区</td>
          <td>2014-6-11 11:11:42</td>
          <td>普通用户</td>
          <td class="td-status"><span class="label label-success radius">已启用</span></td>
          <td class="td-manage">
          <a onClick="member_stop(this,'10001')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
          <a title="编辑" onclick="member_edit('550')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
          <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
          </td>
		</tr>
		  <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>1</td>
          <td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','500','400')">张三</u></td>
          <td>男</td>
          <td>13000000000</td>
          <td>admin@mail.com</td>
          <td class="text-l">北京市 海淀区</td>
          <td>2014-6-11 11:11:42</td>
          <td>普通用户</td>
          <td class="td-status"><span class="label label-success radius">已启用</span></td>
          <td class="td-manage">
          <a onClick="member_stop(this,'10001')"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="icon-ok bigger-120"></i></a>
          <a title="编辑" onclick="member_edit('550')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a>
          <a title="删除" href="javascript:;"  onclick="member_del(this,'1')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
          </td>
		</tr>-->
      </tbody>
	</table>
   </div>
  </div>
 </div>
</div>
<!--添加用户图层-->
<div class="add_menber" id="add_menber_style" style="display:none">

    <ul class=" page-content">
     <li><label class="label_name">用&nbsp;&nbsp;户 &nbsp;名：</label><span class="add_name"><input value="" name="用户名" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">真实姓名：</label><span class="add_name"><input name="真实姓名" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label><span class="add_name">
     <label><input name="form-field-radio" type="radio" checked="checked" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">女</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio" type="radio" class="ace"><span class="lbl">保密</span></label>
     </span>
     <div class="prompt r_f"></div>
     </li>
     <li><label class="label_name">固定电话：</label><span class="add_name"><input name="固定电话" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">移动电话：</label><span class="add_name"><input name="移动电话" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">电子邮箱：</label><span class="add_name"><input name="电子邮箱" type="text"  class="text_add"/></span><div class="prompt r_f"></div></li>
     <li class="adderss"><label class="label_name">家庭住址：</label><span class="add_name"><input name="家庭住址" type="text"  class="text_add" style=" width:350px"/></span><div class="prompt r_f"></div></li>
     <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="add_name">
     <label><input name="form-field-radio1" type="radio" checked="checked" class="ace"><span class="lbl">开启</span></label>&nbsp;&nbsp;&nbsp;
     <label><input name="form-field-radio1"type="radio" class="ace"><span class="lbl">关闭</span></label></span><div class="prompt r_f"></div></li>
    </ul>
 </div>
</body>
</html>
<script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[1,2,3,9,10,11]}// 制定列不参与排序
		] } );


				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});

				});


				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
/*用户-添加*/
 $('#member_add').on('click', function(){
    layer.open({
        type: 1,
        title: '添加用户',
		maxmin: true,
		shadeClose: true, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
          if($(this).val()=="")
          {

			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
				icon:0,
          });
		    num++;
            return false;
          }
		 });
		  if(num>0){  return false;}
          else{
			  layer.alert('添加成功！',{
               title: '提示框',
			icon:1,
			  });
			   layer.close(index);
		  }
		}
    });
});
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url+'#?='+id,w,h);
}
/*用户-停用*/
function member_stop(obj,id){


	layer.confirm('确认要停用吗？',function(index){
			$(obj).parents("tr").find("#stop").submit();


		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find("#start").submit();


		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(id){
	  layer.open({
        type: 1,
        title: '修改用户信息',
		maxmin: true,
		shadeClose:false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
          if($(this).val()=="")
          {

			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',
				icon:0,
          });
		    num++;
            return false;
          }
		 });
		  if(num>0){  return false;}
          else{
			  layer.alert('添加成功！',{
               title: '提示框',
			icon:1,
			  });
			   layer.close(index);
		  }
		}
    });
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		$(obj).parents("tr").find("#del").submit();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}
laydate({
    elem: '#start',
    event: 'focus'
});
function member_ed(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
