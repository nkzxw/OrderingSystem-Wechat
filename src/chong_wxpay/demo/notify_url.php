<?php
/**
 * 通用通知接口demo
 * ====================================================
 * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
 * 商户接收回调信息后，根据需要设定相应的处理流程。
 * 
 * 这里举例使用log文件形式记录回调信息。
*/
	error_reporting(0);
	//session_start();
	include_once("./log_.php");
	include_once("../WxPayPubHelper/WxPayPubHelper.php");
	include_once('../../config/conn.php');
//	include_once('../../config/index_config.php');
	
    //使用通用通知接口
	$notify = new Notify_pub();

	//存储微信的回调
	$xml = $GLOBALS['HTTP_RAW_POST_DATA'];	
	$notify->saveData($xml);
	
	//验证签名，并回应微信。
	//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
	//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
	//尽可能提高通知的成功率，但微信不保证通知最终能成功。
	
	$returnXml = $notify->returnXml();
	//echo $returnXml;
	
	//==商户根据实际情况设置相应的处理流程，此处仅作举例=======
	
	//以log文件形式记录回调信息
	$log_ = new Log_();
	$log_name="./notify_url.log";//log文件路径
	//$log_->log_result($log_name,"【接收到的notify通知】:\n".$xml."\n");

	$notify->setReturnParameter("return_code","SUCCESS");//设置返回码
	$order_ids =$notify->data["out_trade_no"];
	$pay_user = $notify->data["openid"];
	$total_fee = $notify->data["total_fee"];
	$to_money = $total_fee / 100;
		mysql_select_db("my_db", $con);
	$result = mysql_query("SELECT * FROM chongzhi where id = '$order_id'");
	while($row = mysql_fetch_array($result))
 	{
 			$uid = $row['account_id'];
 			$chong_money = $row['chong_money'];
 	 }
 	 
	$order_id = substr($order_ids,4);
	if($notify->data["return_code"] == "SUCCESS"){
		
		$log_->log_result($log_name,"【succsss】:\n".$xml."\n");
		echo "<xml>
  <return_code><![CDATA[SUCCESS]]></return_code>
  <return_msg><![CDATA[OK]]></return_msg>
</xml>";
		update('1');
	
			
	}
	function update($val){
		global $order_id;
		$sql = "update chongzhi set blog = '$val' where id= '$order_id'";
		mysql_query($sql);	
	}
	function update1($val){
		global $uid;
		$sql = "update member set money_still = money_still + '$val' where account_id = '$uid'";
		mysql_query($sql);	
	}

?>