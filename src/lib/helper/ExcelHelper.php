<?php

namespace lib\helper;

require_once PHPEXCEL_LIB_PATH;

class ExcelHelper {
	public static function export($title, $col, $result) {
		$objPHPExcel = new \PHPExcel();
		if ($result) {
			$objPHPExcel -> getProperties() -> setCreator("ChinaData") -> setLastModifiedBy("ChinaData") -> setTitle($title) -> setSubject($title) -> setDescription($title) -> setKeywords("") -> setCategory($title);

			$workSheet = $objPHPExcel -> getActiveSheet();
			$workSheet -> setTitle('0');
			$objPHPExcel -> setActiveSheetIndex(0);
			$objPHPExcel -> getActiveSheet() -> setCellValue('A1', "激活账号");
			$objPHPExcel -> getActiveSheet() -> setCellValue('B1', "内容");
			$objPHPExcel -> getActiveSheet() -> setCellValue('C1', "日期");
			$objPHPExcel -> getActiveSheet() -> getColumnDimension('A')->setAutoSize(true);
			$objPHPExcel -> getActiveSheet() -> getColumnDimension('B')->setAutoSize(true);
			$objPHPExcel -> getActiveSheet() -> getColumnDimension('C')->setAutoSize(true);
			$key2 = 2;
			foreach($result['data'] as $key => $value){
				$array[$key2] = $value;
				$key2++;
			}
			$max = count($array);
			$max = $max+2;
			for ($i = 2; $i < $max; $i++) {
				$tmp = $array[$i];
				$objPHPExcel -> getActiveSheet() -> setCellValue('A' . $i, $tmp['LogUser_Username']) -> setCellValue('B' . $i, $tmp['LogUser_Message']) -> setCellValue('C' . $i, $tmp['LogUser_CreateDate']);

			}

		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="output.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		// Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		// always modified
		header('Cache-Control: cache, must-revalidate');
		// HTTP/1.1
		header('Pragma: public');
		// HTTP/1.0

		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter -> save('php://output');
		exit ;
	}

}
