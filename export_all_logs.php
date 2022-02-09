@@ -0,0 +1,656 @@
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
$header = array('LOG TYPE','LOG DATE','LOG BY','USER ID','USER NAME','DEPARTMENT','CONTROL NUMBER','ASSET TAG NUMBER','ITEM NUMBER','CATEGORY','SERIAL NUMBER','ITEM DETAILS','ITEM ADDED DATE','REMARKS','STATUS','RETURNING PLAN DATE','BORROWED DATE','BORROWED BY','RETURNED DATE','RETURNED BY'); //excel column
     $objPHPExcel->getActiveSheet()->freezePane("A3");
	$count = count($header);
	for($colxls = 0; $colxls <= $count-1; $colxls++ )
	{
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls, $header[$colxls]);
         
	}



//design of colum
$objPHPExcel->getActiveSheet()
                ->getStyle("A2:T2")
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK)
                ->getColor()
                ->setRGB('000000');





$colxls =0;
$rowxls++;


$sql1 = "SELECT * 
		FROM logs";
$query1 = mysqli_query($conn, $sql1);

	while ($row=mysqli_fetch_array($query1))
    {
            $log_type = $row['log_type'];
            $dated_log = $row['dated_log'];
            $log_by = $row['log_by'];
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $department = $row['department'];
            $control_no = $row['ctrl_no'];
            $asset_tag_no = $row['asset_tag_no'];
            $item_no = $row['item_no'];
            $category = $row['category'];
            $serial_no = $row['serial_no'];
            $item_details = $row['item_details'];
            $item_added_date = $row['item_added_date'];
            $remarks = $row['remarks'];
            $status = $row['status'];
            $returning_plan_date = $row['returning_plan_date'];
            $borrowed_date = $row['borrowed_date'];
            $borrowed_by = $row['borrowed_by'];
            $returned_date = $row['returned_date'];
            $returned_by = $row['returned_by'];
    
        
        //$log_type --------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$log_type );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        //$dated_log-------------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$dated_log );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        //$log_by-----------------------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$log_by );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$user_id----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$user_id );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$user_name----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$user_name );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        //$department----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$department );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        //$control_no----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$control_no );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$asset_tag_no----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$asset_tag_no );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$item_no----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$item_no );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$category----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$category );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$serial_no----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$serial_no );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$item_details----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$item_details );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$item_added_date----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$item_added_date );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$remarks----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$remarks );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$status----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$status );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$returning_plan_date----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$returning_plan_date );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$borrowed_date----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$borrowed_date );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$borrowed_by----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$borrowed_by );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$returned_date----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$returned_date );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
        
        
        //$returned_by----------------------------------------------------
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
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colxls,$rowxls,$returned_by );
        $objPHPExcel->getActiveSheet()->getColumnDimension(getNameFromNumber($colxls+1))->setAutoSize(true);
        $colxls++;
        
        
    
        
        $rowxls++;
        $colxls = 0;
    }











$today = date("m-d-y");

 $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);

            $date = date('m-d-Y');
    $file = "Activity Logs ".$today.".php";
    //echo $file;
    $objWriter->save(str_replace('.php', '.xlsx', $file));
    $filename = str_replace('.php', '.xlsx', $file);



   // $objWriter->save('php://output');


?>

