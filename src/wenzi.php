<?php 
/**
 *����google api���ɶ�ά��ͼƬ
* $content����ά�����ݲ���
* $size�����ɶ�ά��ĳߴ磬��Ⱥ͸߶ȵ�ֵ
* $lev����ѡ����������ȼ�
* $margin�����ɵĶ�ά����߿�ľ���
*/
function create_erweima($content, $size = '300', $lev = 'L', $margin= '0') {
	$content = urlencode($content);
	$image = '<img src="http://chart.apis.google.com/chart?chs='.$size.'x'.$size.'&amp;cht=qr&chld='.$lev.'|'.$margin.'&amp;chl='.$content.'"  widht="'.$size.'" height="'.$size.'" />';
	return $image;
}
/*
 * ʹ��ע������
* 1.�ȹ��������ַ���
* 2.���ú�������
*/
//���������ַ���
//(��ע��\r\nΪ���лس�)
$content="΢�Ź���ƽ̨��˼ά���߼�\r\n���ں�:siweiyuluoji";
//Ϊ��ֹ���룬����ת��
$encode = mb_detect_encoding($content, array("ASCII","UTF-8","GB2312","GBK","BIG5"));
$str= iconv($encode, "UTF-8", $content);
//���ú������ɶ�ά��ͼƬ
echo create_erweima($str);
echo "<br/>";

/**********************************************/
//��ַ���ɶ�ά��
$url="weixin://wxpay/bizpayurl?pr=e7tP6yqbool";
$url.="\r\n";
$url.="weixin://wxpay/bizpayurl?pr=e7tP6yqbool";
echo create_erweima($url);

















exit;
require_once 'common.php';
$smarty->assign("xieyi",1);
$title="��վע��Э��";
$smarty->assign("html_title",mb_convert_encoding($title,"UTF-8","GBK"));
$smarty->display("xieyi.html");


?>