<?php
include 'PHPExcel.php';
include 'PHPExcel/Writer/Excel2007.php';

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'brs'; // Database Name

$conn = mysqli_connect('localhost','root','','brs');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


function getNameFromNumber($num) {
    $numeric = ($num - 1) % 26;
    $letter = chr(65 + $numeric);
    $num2 = intval(($num - 1) / 26);
    if ($num2 > 0) {
        return getNameFromNumber($num2) . $letter;
    } else {
        return $letter;
    }
}

$objPHPExcel = new PHPExcel();
// Set properties
$rowxls = 2; // 1-2-3
$colxls = 1; // A-B-C

$objPHPExcel->getActiveSheet()->setTitle('page 1');
$header = array('Employee ID','Employee Name','Department','Email'); //excel column
     $objPHPExcel->getActiveSheet()->freezePane("A3");
	$count = count($header);
	for($colxls = 0; $colxls <= $count-1; $colxls++ )
	{
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls, $header[$colxls]);
         
	}



//design of colum
$objPHPExcel->getActiveSheet()
                ->getStyle("A2:D2")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK)
                ->getColor()
                ->setRGB('000000');





$colxls =0;
$rowxls++;

/* $sql1 = "SELECT * 
		FROM tbl_emp_user";
$query1 = mysqli_query($conn, $sql1);

	while ($row=mysqli_fetch_array($query1))
    {
            $emp_id = $row['emp_id'];
            $emp_name = $row['emp_name'];
            $emp_dept = $row['emp_department'];
            $emp_email = $row['emp_email'];
    
        
        //emp_id --------------------------------------------
        $set_style_no  =getNameFromNumber($colxls+1)."".$rowxls;
                                                    
  
        $objPHPExcel->getActiveSheet()                                
        ->getStyle($set_style_no)                                               
            ->getBorders()
            ->getLeft()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)                                      
            ->getColor()
            ->setRGB('000000');                                                
              
        //border right                                        
        $objPHPExcel->getActiveSheet()
         ->getStyle($set_style_no)
         ->getBorders()
         ->getRight()
         ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
         ->getColor()
         ->setRGB('000000');
                                                                                    //change value
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$emp_id );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        //emp_name-------------------------------------------------------
        $set_style_no  =getNameFromNumber($colxls+1)."".$rowxls;
                                                    
  
        $objPHPExcel->getActiveSheet()                                
        ->getStyle($set_style_no)                                               
            ->getBorders()
            ->getLeft()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)                                      
            ->getColor()
            ->setRGB('000000');                                                
              
        //border right                                        
        $objPHPExcel->getActiveSheet()
         ->getStyle($set_style_no)
         ->getBorders()
         ->getRight()
         ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
         ->getColor()
         ->setRGB('000000');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$emp_name );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        //emp_dept-----------------------------------------------------------------
        $set_style_no  =getNameFromNumber($colxls+1)."".$rowxls;
                                                    
  
        $objPHPExcel->getActiveSheet()                                
        ->getStyle($set_style_no)                                               
            ->getBorders()
            ->getLeft()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)                                      
            ->getColor()
            ->setRGB('000000');                                                
              
        //border right                                         
        $objPHPExcel->getActiveSheet()
         ->getStyle($set_style_no)
         ->getBorders()
         ->getRight()
         ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
         ->getColor()
         ->setRGB('000000');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$emp_dept );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //emp_email----------------------------------------------------
        $set_style_no  =getNameFromNumber($colxls+1)."".$rowxls;
                                                    
  
        $objPHPExcel->getActiveSheet()                                
        ->getStyle($set_style_no)                                               
            ->getBorders()
            ->getLeft()
            ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)                                      
            ->getColor()
            ->setRGB('000000');                                                
              
        //border right                                        
        $objPHPExcel->getActiveSheet()
         ->getStyle($set_style_no)
         ->getBorders()
         ->getRight()
         ->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN)
         ->getColor()
         ->setRGB('000000');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$emp_email );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
    
        
        $rowxls++;
        $colxls = 0;
    }


*/








$today = date("m-d-y");

 $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

            $date = date('m-d-Y');
    $file = "Employee Info ".$today.".php";
    //echo $file;
    $objWriter->save(str_replace('.php', '.xlsx', $file));
    $filename = str_replace('.php', '.xlsx', $file);



   // $objWriter->save('php://output');


?>


