<?php
	
	require_once("../config/conn.php");
	require_once("Classes/PHPExcel.php");
	include("Classes/PHPExcel/IOFactory.php"); 
	
	header("Content-Type: text/html; charset=utf8");
	$type = $_GET['type'];
	$time = $_GET['time'];
	error_reporting(0);
	//$id=$_GET["id"];
	
	
	//����һ��excel����
	$objPHPExcel = new PHPExcel();

	// Set properties  �����ļ�����
	$objPHPExcel->getProperties()->setCreator("ctos")
        ->setLastModifiedBy("ctos")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");

	//set width  ���ñ����
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(45);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);

	

	//����ˮƽ����  
	$objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
		
	// set table header content  ���ñ�ͷ���� 
	$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'ID')
        ->setCellValue('B1', 'wx_nickname')
        ->setCellValue('C1', 'sex')
        ->setCellValue('D1', 'openid')
        ->setCellValue('E1', 'money_still')
        ->setCellValue('F1', 'points')
        ->setCellValue('G1','phone')
        ->setCellValue('H1','truename')
        ->setCellValue('I1','rank')
        ->setCellValue('J1','storename');
$rownum=1;
	if($type == 1){
     $today= date("Y/m/d");
   }else if($type==2){
     $today= date("Y/m/d",strtotime("-1 weeks"));
   }else if($type==3){
     $today= date("Y/m/d",strtotime("-1 months"));
   }else if($type==4){
     $today= date("Y/m/d",strtotime("-1 years"));
   }
   $zhou=strtotime($today);//��ȡ��ǰʱ��
require('../config/index_class1.php');
   $sql="select * from member";//��ѯ���

   $res=mysql_query($sql);//ִ�в�ѯ
   while($r=mysql_fetch_assoc($res)){
       $ro[]=$r;//���ܽ����
   }
   foreach($ro as $key=>$v){
     if(strtotime($v['create_date']) > $zhou){
			
		$rownum++;
		$account_id = $v["account_id"];
		$wx_nickname = $v["wx_nickname"];
		$wx_sex = $v["wx_sex"];
		$wx_openid = $v["wx_opneid"];
		$money_still = $v["money_still"];
		
		$points=$v["points"];
		$tel =$v["tel"];
		$real_name =$v["real_name"];
		$rank = rank_ec1($v['cardtype']);
		$store_name = store_name_select($v['store_id'],'1');
			
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $rownum, $account_id);  
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $rownum, $wx_nickname);
		$objPHPExcel->getActiveSheet()->setCellValue('C' . $rownum, $wx_sex);	
		$objPHPExcel->getActiveSheet()->setCellValue('D' . $rownum, $wx_opneid);	
		$objPHPExcel->getActiveSheet()->setCellValue('E' . $rownum, $money_still);	
		$objPHPExcel->getActiveSheet()->setCellValue('F' . $rownum, $points);	
		$objPHPExcel->getActiveSheet()->setCellValue('G' . $rownum, $tel);	
		$objPHPExcel->getActiveSheet()->setCellValue('H' . $rownum, $real_name);
		$objPHPExcel->getActiveSheet()->setCellValue('I' . $rownum, $rank);
		$objPHPExcel->getActiveSheet()->setCellValue('J' . $rownum, $store_name);
	}

	}
		
	 function rank_ec1($id){
    
    $sql="select * from member_rank where rank_id = '$id' ";//��ѯ���
    $res=mysql_query($sql);//ִ�в�ѯ
    while($row=mysql_fetch_assoc($res)){
        $rows[]=$row;//���ܽ����
    }
    //��������
    foreach($rows as $key=>$v){
      return $v['rank_name'];
    }
}	

	$objPHPExcel->getActiveSheet()->setTitle('Simple');


	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	//	$filename="���۶���".date('Y-m-d');
	// Redirect output to a client��s web browser (Excel5)
//	ob_end_clean();//���������,��������
	header('Content-Type: application/vnd.ms-excel');
	//	header('Content-Disposition: attachment;filename='.$filename);
	header('Content-Disposition: attachment;filename="��Ա��Ϣ��.xls"');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
?>