  <?php
  require('config/index_class.php');

    if(check_dept('35') == false){
  		  exit('<script>alert(\'您没有权限访问本页面\');history.back();</script>');
  	}
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
           <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
          <link rel="stylesheet" href="css/style.css"/>
          <link href="assets/css/codemirror.css" rel="stylesheet">
          <link rel="stylesheet" href="assets/css/colorbox.css">
           <!--图片相册-->
          <link rel="stylesheet" href="assets/css/ace.min.css" />

          <link rel="stylesheet" href="font/css/font-awesome.min.css" />
          <!--[if lte IE 8]>
        <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
      <![endif]-->

      <script src="js/jquery-1.9.1.min.js"></script>
          <script src="assets/js/jquery.colorbox-min.js"></script>
      <script src="assets/js/typeahead-bs2.min.js"></script>
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <script src="assets/js/jquery.dataTables.bootstrap.js"></script>
          <script src="assets/layer/layer.js" type="text/javascript" ></script>
          <script type="text/javascript" src="Widget/swfupload/swfupload.js"></script>
          <script type="text/javascript" src="Widget/swfupload/swfupload.queue.js"></script>
          <script type="text/javascript" src="Widget/swfupload/swfupload.speed.js"></script>
          <script type="text/javascript" src="Widget/swfupload/handlers.js"></script>
          <script src="../js/layui.js" charset="utf-8"></script>

  <title>列表</title>
  </head>

  <body>
  <div class="page-content clearfix">
   <div class="sort_adsadd_style">
    <div class="border clearfix">
         <span class="l_f">
          <a href="javascript:ovid()"  id="ads_add" title="添加品牌" class="btn btn-warning Order_form"><i class="fa fa-plus"></i> 添加交班</a>
        <!--  <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
          <a href="javascript:ovid()" onClick="javascript :history.back(-1);" class="btn btn-info"><i class="fa fa-reply"></i> 返回上一步</a>-->
         </span>
      <!-- <span class="r_f">共：<b>234</b>个品牌</span>-->
       </div>
   <!--列表样式-->
      <div class="sort_Ads_list">
         <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
       <tr>
          <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
          <th width="80px">管理员</th>
          <th width="180px">开始时间</th>
          <th width="180px">结束时间</th>
          <th  width="80px">全部订单数量</th>
          <th width="80px">处理订单数量</th>
          <th width="180">操作</th>
        </tr>
      </thead>
    <tbody>
       <?php
  jiaoban_list($admin_sql1);
  ?>

      </tbody>
      </table>
       </div>

   </div>
  </div>
  <!--添加广告样式-->
  <div id="add_ads_style"  style="display:none">
   <div class="add_adverts">
   <ul>
    <li>

    <form action="action/jiaoban_add.php" method="POST" enctype="multipart/form-data">
    <li><label class="label_name">开始时间</label><span class="cont_style">
      <input name="start_time" type="text" id="form-field-1" placeholder="点击选择开始时间" class="col-xs-10 col-sm-5" onclick="layui.laydate({elem: this, max: laydate.now(), istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></span></li><BR><BR>
      <li><label class="label_name">结束时间</label><span class="cont_style">
        <input name="stop_time" type="text" id="form-field-1" placeholder="点击选择结束时间" class="col-xs-10 col-sm-5"  onclick="layui.laydate({elem: this, max: laydate.now(), istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></span></li>


        <BR> <BR> <div class="layui-layer-btn"><button type="submit" style="padding:1px 15px;" class="layui-layer-btn0">提交</button><a class="layui-layer-btn1">取消</a></div>
   <div class="demo" style="display:none;">
               <div class="logobox"><div class="resizebox"><img src="images/image.png" width="100px" alt="" height="100px"/></div></div>
                 <div class="logoupload">
                    <div class="btnbox"><a id="uploadBtnHolder" class="uploadbtn" href="javascript:;">上传替换</a></div>
                    <div style="clear:both;height:0;overflow:hidden;"></div>
                    <div class="progress-box" style="display:none;">
                      <div class="progress-num">上传进度：<b>0%</b></div>
                      <div class="progress-bar"><div style="width:0%;" class="bar-line"></div></div>
                    </div>  <div class="prompt"><p>图片大小小于5MB,支持.jpg;.gif;.png;.jpeg格式的图片</p></div>
                </div>
             </div>
     </span>
    </li>

   </form>

   </ul>
   </div>
  </div>
  </body>
  </html>
  <script>
   /*******添加广告*********/
   $('#ads_add').on('click', function(){
      layer.open({
          type: 1,
          title: '添加交班',
      maxmin: true,
      shadeClose: false, //点击遮罩关闭层
          area : ['800px' , '400px'],
          content:$('#add_ads_style'),

      yes:function(index,layero){
       var num=0;
       var str="";
       $(".add_adverts input[type$='text']").each(function(n){
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
  })
  </script>
  <script type="text/javascript">
  function updateProgress(file) {
    $('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
    $('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
    if(parseInt(file.percentUploaded) == 100) {
      // 如果上传完成了
      $('.progress-box').hide();
    }
  }

  function initProgress() {
    $('.progress-box').show();
    $('.progress-box .progress-bar > div').css('width', '0%');
    $('.progress-box .progress-num > b').html('0%');
  }

  function successAction(fileInfo) {
    var up_path = fileInfo.path;
    var up_width = fileInfo.width;
    var up_height = fileInfo.height;
    var _up_width,_up_height;
    if(up_width > 120) {
      _up_width = 120;
      _up_height = _up_width*up_height/up_width;
    }
    $(".logobox .resizebox").css({width: _up_width, height: _up_height});
    $(".logobox .resizebox > img").attr('src', up_path);
    $(".logobox .resizebox > img").attr('width', _up_width);
    $(".logobox .resizebox > img").attr('height', _up_height);
  }

  var swfImageUpload;
  $(document).ready(function() {
    var settings = {
      flash_url : "Widget/swfupload/swfupload.swf",
      flash9_url : "Widget/swfupload/swfupload_fp9.swf",
      upload_url: "upload.php",// 接受上传的地址
      file_size_limit : "5MB",// 文件大小限制
      file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
      file_types_description : "图片",// 说明，自己定义
      file_upload_limit : 100,
      file_queue_limit : 0,
      custom_settings : {},
      debug: false,
      // Button settings
      button_image_url: "Widget/swfupload/upload-btn.png",
      button_width: "95",
      button_height: "30 ",
      button_placeholder_id: 'uploadBtnHolder',
      button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
      button_cursor : SWFUpload.CURSOR.HAND,
      button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,

      moving_average_history_size: 40,

      // The event handler functions are defined in handlers.js
      swfupload_preload_handler : preLoad,
      swfupload_load_failed_handler : loadFailed,
      file_queued_handler : fileQueued,
      file_dialog_complete_handler: fileDialogComplete,
      upload_start_handler : function (file) {
        initProgress();
        updateProgress(file);
      },
      upload_progress_handler : function(file, bytesComplete, bytesTotal) {
        updateProgress(file);
      },
      upload_success_handler : function(file, data, response) {
        // 上传成功后处理函数
        var fileInfo = eval("(" + data + ")");
        successAction(fileInfo);
      },
      upload_error_handler : function(file, errorCode, message) {
        alert('上传发生了错误！');
      },
      file_queue_error_handler : function(file, errorCode, message) {
        if(errorCode == -110) {
          alert('您选择的文件太大了。');
        }
      }
    };
    swfImageUpload = new SWFUpload(settings);
  });
   jQuery(function($) {
     var colorbox_params = {
      reposition:true,
      scalePhotos:true,
      scrolling:false,
      previous:'<i class="fa fa-chevron-left"></i>',
      next:'<i class="fa fa-chevron-right"></i>',
      close:'&times;',
      current:'{current} of {total}',
      maxWidth:'100%',
      maxHeight:'100%',
      onOpen:function(){
        document.body.style.overflow = 'hidden';
      },
      onClosed:function(){
        document.body.style.overflow = 'auto';
      },
      onComplete:function(){
        $.colorbox.resize();
      }
    };

    $('.table-striped [data-rel="colorbox"]').colorbox(colorbox_params);
    $("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");

  })
      </script>
  </script>
  <script>
  function member_del(obj,id){
  layer.confirm('确认要删除吗？',function(index){

  $(obj).parents("tr").find("#in").submit();
    layer.msg('已删除!',{icon:1,time:1000});
  });
  }
  function member_de(obj,id){
  layer.confirm('确认要更改吗？',function(index){
    $(obj).parents("tr").find("#ig").submit();

    layer.msg('已完成更改!',{icon:1,time:1000});
  });
  }
  jQuery(function($) {
          var oTable1 = $('#sample-table').dataTable( {
          "aaSorting": [[ 1, "desc" ]],//默认第几个排序
      "bStateSave": true,//状态保存
      "aoColumnDefs": [
        //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
        {"orderable":false,"aTargets":[0,1,6]}// 制定列不参与排序
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
  </script>
  <script>
  layui.use('laydate', function(){
    var laydate = layui.laydate;

    var start = {
      min: laydate.now()
      ,max: '2099-06-16 23:59:59'
      ,istoday: false
      ,choose: function(datas){
        end.min = datas; //开始日选好后，重置结束日的最小日期
        end.start = datas //将结束日的初始值设定为开始日
      }
    };

    var end = {
      min: laydate.now()
      ,max: '2099-06-16 23:59:59'
      ,istoday: false
      ,choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
      }
    };

    document.getElementById('LAY_demorange_s').onclick = function(){
      start.elem = this;
      laydate(start);
    }
    document.getElementById('LAY_demorange_e').onclick = function(){
      end.elem = this
      laydate(end);
    }

  });
  </script>
