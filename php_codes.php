<?php

require_once('functions.php');





//to count available items on adm_home.php
$count_avail_items = count_data($connection,"items","status = 'AVAILABLE'");

//to count borrowed items on adm_home.php
$count_borrowed_items = count_data($connection,"items","status = 'BORROWED'");

//to count on going repair items on adm_home.php
$count_ongoingRepair_items = count_data($connection,"items","status = 'UNDER REPAIR'");

//to count for disposal items on adm_home.php
$count_forDisposal_items = count_data($connection,"items","status = 'FOR DISPOSAL'");








//-------------------------------------LOGIN BUTTON LOGIN.PHP

//button LOGIN MAIN
if(ISSET($_POST['btn_login']))
{
    
    if(ISSET($_POST['txt_username']) && ISSET($_POST['txt_password']))
    {
           
            $user_name = $_POST['txt_username']; 
            $pass = $_POST['txt_password']; 
        
        
            
        if ($user_name == "default" && $pass == "1234")//default login
        {
            $_SESSION['username'] = "default";  //session 
            $_SESSION['ROLE'] = "ADMIN";
            
            echo "<script>
                    alert('DEFAULT PASSWORD HAS BEEN LOGIN' );
                    window.location.href ='adm_home.php';
                </script>";
        }
        elseif( loginAccount($user_name,$pass) !== false)//ldap
        {           
        
            echo"<script> alert('Log in Successful ".$_SESSION['username']."'); window.location.href = 'user_home.php';
                      </script>";
            
        }
        elseif(loginAdmin($user_name, $pass,$connection) !== false)//database admin login
        {
            
                echo"<script> alert('Log in Successful ".$_SESSION['username']."'); window.location.href = 'adm_home.php';
                      </script>";

        }
        elseif(loginUser($user_name, $pass,$connection) !== false)//database user login
        {
        
             echo"<script> alert('Log in Successful ".$_SESSION['username']."'); window.location.href = 'user_home.php';
                      </script>";
  
        }
        else //invalid user
        {
            echo"<script>alert('Invalid username or password');
				      window.location.href = 'brs_logout.php';
                      </script>";
	
        }
  
        
    }
}












//-------------------------------------ADD BUTTON MODAL.PHP

if(ISSET($_POST['btn_add_item']))
{
    if(ISSET($_POST['txt_ctrl_no']) && ISSET($_POST['txt_asset_tag_no']) && ISSET($_POST['txt_item_no']) && ISSET($_POST['dropdown_categories']) && ISSET($_POST['txt_serial_no']) && ISSET($_POST['txt_item_details']) && ISSET($_POST['txt_remarks']) && ISSET($_POST['dropdown_status']))
    {
     $txt_ctrl_no = $_POST['txt_ctrl_no'];
     $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
     $txt_item_no = $_POST['txt_item_no'];
     $dropdown_categories = $_POST['dropdown_categories'];
     $txt_serial_no = $_POST['txt_serial_no'];
     $txt_item_details = $_POST['txt_item_details'];
     $txt_remarks = $_POST['txt_remarks'];
     $dropdown_status = $_POST['dropdown_status'];
        
     $date = date("Y-m-d H:i:s", time());
     $log_type = "ADD ITEM";
     $log_by = $_SESSION['username'];
    
    $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
    $array_column_values0 = array($log_type,$date,$log_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$dropdown_categories,$txt_serial_no,$txt_item_details,$date,$txt_remarks,$dropdown_status,"","","","","");    
    
    query_add($connection,"logs",$array_columns0,$array_column_values0);
        
    
    $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status","item_added_date");
    $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status,$date);
     
    query_add($connection,"items",$array_columns,$array_column_values);
    
    echo"<script>alert('Item Added Successfully');
				      window.location.href = 'adm_home.php';
                      </script>";
        
    }
}













//-------------------------------------UPDATE BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_update_item']))
{
    
    
    if(ISSET($_POST['txt_ctrl_no']) && ISSET($_POST['txt_asset_tag_no']) && ISSET($_POST['txt_item_no']) && ISSET($_POST['dropdown_categories']) && ISSET($_POST['txt_serial_no']) && ISSET($_POST['txt_item_details']) && ISSET($_POST['txt_remarks']) && ISSET($_POST['dropdown_status']))
    {
        
        
     $txt_ctrl_no = $_POST['txt_ctrl_no'];
     $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
     $txt_item_no = $_POST['txt_item_no'];
     $dropdown_categories = $_POST['dropdown_categories'];
     $txt_serial_no = $_POST['txt_serial_no'];
     $txt_item_details = $_POST['txt_item_details'];
     $txt_remarks = $_POST['txt_remarks'];
     $dropdown_status = $_POST['dropdown_status'];
        
     $date = date("Y-m-d H:i:s", time());
     $log_type = "UPDATE ITEM";
     $log_by = $_SESSION['username'];
         
    $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
    $array_column_values0 = array($log_type,$date,$log_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$dropdown_categories,$txt_serial_no,$txt_item_details,"",$txt_remarks,$dropdown_status,"","","","","");    
    
    query_add($connection,"logs",$array_columns0,$array_column_values0);
        
        
    $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status");
    $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status);
        
    query_update($connection,"items",$array_columns,$array_column_values,"ctrl_no = '$txt_ctrl_no'");
        
    echo"<script>alert('Item Updated Successfully');
				      window.location.href = 'adm_home.php';
                      </script>";
    }
}
//-------------------------------------AJAX SELECT DATA FOR UPDATE BUTTON MODAL.PHP
if(!empty($_POST['ajax_update_control_no']))
{
    $ctrlno = $_POST['ajax_update_control_no'];
    
    $result =  select_data($connection,"items","*","ctrl_no = '$ctrlno'");
    
    while($row = $result->fetch_assoc() )
    {
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $remarks = $row['remarks'];
    $status = $row['status'];
    $test = $row['test'];
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test);
        
    echo json_encode($array_items);

    }
}











//-------------------------------------DELETE BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_delete_item']))
{
    
    
    if(ISSET($_POST['txt_ctrl_no']))
    {
 
     $txt_ctrl_no = $_POST['txt_ctrl_no'];
        
     $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
     $txt_item_no = $_POST['txt_item_no'];
     $txt_serial_no = $_POST['txt_serial_no'];
     $txt_item_details = $_POST['txt_item_details'];
     $txt_remarks = $_POST['txt_remarks'];
        
     $date = date("Y-m-d H:i:s", time());
     $log_type = "DELETE ITEM";
     $log_by = $_SESSION['username'];
        
    $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
    $array_column_values0 = array($log_type,$date,$log_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,"",$txt_serial_no,$txt_item_details,"",$txt_remarks,"","","","","","");    
    
    query_add($connection,"logs",$array_columns0,$array_column_values0);
      
    
    query_delete($connection,"items"," ctrl_no = '$txt_ctrl_no'");
        
    echo"<script>alert('Item Deleted Successfully');
				      window.location.href = 'adm_home.php';
                      </script>";
        }
}
//-------------------------------------AJAX SELECT DATA FOR DELETE BUTTON MODAL.PHP
if(!empty($_POST['ajax_delete_control_no']))
{
    $ctrlno = $_POST['ajax_delete_control_no'];
    
    $result =  select_data($connection,"items","*","ctrl_no = '$ctrlno'");
    
    while($row = $result->fetch_assoc() )
    {
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $remarks = $row['remarks'];
    $status = $row['status'];
    $test = $row['test'];
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test);
        
    echo json_encode($array_items);

    }
}











//-------------------------------------MANAGE USER RETURNER  ADD BUTTON  MODAL.PHP

if(ISSET($_POST['btn_add_manage_returner']))
{
    if(ISSET($_POST['txt_user_id']) && ISSET($_POST['txt_user_name']) && ISSET($_POST['txt_password']) && ISSET($_POST['dropdown_department']) )
    {
        $txt_user_id = $_POST['txt_user_id'];
        $txt_user_name = $_POST['txt_user_name'];
        $txt_password = $_POST['txt_password'];
        $dropdown_department = $_POST['dropdown_department'];

        $txt_password = sha1($txt_password);
        
        
        $date = date("Y-m-d H:i:s", time());
        $log_type = "ADD USER";
        $log_by = $_SESSION['username'];

        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$log_by,$txt_user_id,$txt_user_name,$dropdown_department,"","","","","","","","","","","","","","");    
        query_add($connection,"logs",$array_columns0,$array_column_values0);
        

        $array_columns = array("user_id","user_name","pass","department");
        $array_column_values = array($txt_user_id,$txt_user_name,$txt_password,$dropdown_department);

        query_add($connection,"user",$array_columns,$array_column_values);

        echo"<script>alert('User Added Successfully');
                          window.location.href = 'adm_home.php';
                          </script>";
        
    }
}








//-------------------------------------MANAGE USER RETURNER UPDATE BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_update_manage_returner']))
{
    
    
    if(ISSET($_POST['update_txt_user_id']) && ISSET($_POST['update_txt_user_name']) && ISSET($_POST['update_txt_password']) && ISSET($_POST['update_dropdown_department']) )
    {
        $update_txt_user_id = $_POST['update_txt_user_id'];
        $update_txt_user_name = $_POST['update_txt_user_name'];
        $update_txt_password = $_POST['update_txt_password'];
        $update_dropdown_department = $_POST['update_dropdown_department'];

        $update_txt_password = sha1($update_txt_password);
        
        $date = date("Y-m-d H:i:s", time());
        $log_type = "UPDATE USER";
        $log_by = $_SESSION['username'];

        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$log_by,$update_txt_user_id,$update_txt_user_name,$update_dropdown_department,"","","","","","","","","","","","","","");    
        query_add($connection,"logs",$array_columns0,$array_column_values0);

        
        $array_columns = array("user_id","user_name","pass","department");
        $array_column_values = array($update_txt_user_id,$update_txt_user_name,$update_txt_password,$update_dropdown_department);
        
        query_update($connection,"user",$array_columns,$array_column_values,"user_id = '$update_txt_user_id'");

        echo"<script>alert('User Updated Successfully');
                          window.location.href = 'adm_home.php';
                          </script>";   
    }  
}
//-------------------------------------AJAX SELECT DATA FOR MANAGE RETURNER BUTTON MODAL.PHP
if(!empty($_POST['ajax_manage_returner_control_no']))
{
    $ctrlno = $_POST['ajax_manage_returner_control_no'];
    
    $result =  select_data($connection,"user","*","user_id = '$ctrlno'");
    
    while($row = $result->fetch_assoc() )
    {
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $pass = $row['pass'];
    $department = $row['department'];
    
        
    $array_items = array($user_id,$user_name,$pass,$department);
        
    echo json_encode($array_items);

    }
}



























//-------------------------------------BORROW BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_borrow_item']))
{
    if($_SESSION['ROLE'] == "ADMIN")
    {
        if(ISSET($_POST['txt_ctrl_no']))
        {

        $txt_ctrl_no = $_POST['txt_ctrl_no'];
        $borrowed_by = $_SESSION['username'];

        $query = "UPDATE items SET status ='BORROWED' WHERE ctrl_no = '$txt_ctrl_no'";
        $query2 = "UPDATE items SET borrowed_by = '$borrowed_by' WHERE ctrl_no = '$txt_ctrl_no'";

        $result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query2);

        }


        //to add in borrowed_items table
         $txt_ctrl_no = $_POST['txt_ctrl_no'];
         $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
         $txt_item_no = $_POST['txt_item_no'];
         $borrow_dropdown_categories = $_POST['borrow_dropdown_categories'];
         $txt_serial_no = $_POST['txt_serial_no'];
         $txt_item_details = $_POST['txt_item_details'];
         $txt_remarks = $_POST['txt_remarks'];
         $dropdown_status = "BORROWED";
         $returning_plan_date = $_POST['borrow_date_time'];
         $date = date("Y-m-d H:i:s", time());
         $borrowed_by = $_SESSION['username'];

         $log_type = "BORROW";


        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$borrowed_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$borrow_dropdown_categories,$txt_serial_no,$txt_item_details,"",$txt_remarks,$dropdown_status,$returning_plan_date,$date,$borrowed_by,"",""); 

        query_add($connection,"logs",$array_columns0,$array_column_values0);



        $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status","returning_plan_date","borrowed_date","borrowed_by");
        $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$borrow_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status,$returning_plan_date,$date,$borrowed_by);

        query_add($connection,"borrowed_items",$array_columns,$array_column_values);



        echo"<script>alert('Item Borrowed Successfully');
                          window.location.href = 'adm_home.php';
                          </script>"; 
    }
    else
    {
        if(ISSET($_POST['txt_ctrl_no']))
        {

        $txt_ctrl_no = $_POST['txt_ctrl_no'];
        $borrowed_by = $_SESSION['username'];

        $query = "UPDATE items SET status ='BORROWED' WHERE ctrl_no = '$txt_ctrl_no'";
        $query2 = "UPDATE items SET borrowed_by = '$borrowed_by' WHERE ctrl_no = '$txt_ctrl_no'";

        $result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query2);

        }


        //to add in borrowed_items table
         $txt_ctrl_no = $_POST['txt_ctrl_no'];
         $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
         $txt_item_no = $_POST['txt_item_no'];
         $borrow_dropdown_categories = $_POST['borrow_dropdown_categories'];
         $txt_serial_no = $_POST['txt_serial_no'];
         $txt_item_details = $_POST['txt_item_details'];
         $txt_remarks = $_POST['txt_remarks'];
         $dropdown_status = "BORROWED";
         $returning_plan_date = $_POST['borrow_date_time'];
         $date = date("Y-m-d H:i:s", time());
         $borrowed_by = $_SESSION['username'];

         $log_type = "BORROW";


        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$borrowed_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$borrow_dropdown_categories,$txt_serial_no,$txt_item_details,"",$txt_remarks,$dropdown_status,$returning_plan_date,$date,$borrowed_by,"",""); 

        query_add($connection,"logs",$array_columns0,$array_column_values0);



        $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status","returning_plan_date","borrowed_date","borrowed_by");
        $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$borrow_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status,$returning_plan_date,$date,$borrowed_by);

        query_add($connection,"borrowed_items",$array_columns,$array_column_values);



        echo"<script>alert('Item Borrowed Successfully');
                          window.location.href = 'user_home.php';
                          </script>"; 
        }
  
}
//-------------------------------------AJAX SELECT DATA FOR BORROW BUTTON MODAL.PHP
if(!empty($_POST['ajax_borrow_control_no']))
{
    $ctrlno = $_POST['ajax_borrow_control_no'];
    
    $result =  select_data($connection,"items","*","ctrl_no = '$ctrlno'");
    
    while($row = $result->fetch_assoc() )
    {
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $remarks = $row['remarks'];
    $status = $row['status'];
    $test = $row['test'];
    $borrowed_by = $row['borrowed_by'];
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test,$borrowed_by);
        
    echo json_encode($array_items);

    }
}















//-------------------------------------RETURN BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_return_item']))
{
    if($_SESSION['ROLE'] == "ADMIN")
    {
        if(ISSET($_POST['txt_ctrl_no']))
        {

        $txt_ctrl_no = $_POST['txt_ctrl_no'];

        $query = "UPDATE items SET status ='AVAILABLE' WHERE ctrl_no = '$txt_ctrl_no'";
        $query2 = "UPDATE items SET borrowed_by ='' WHERE ctrl_no = '$txt_ctrl_no'";

        $result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query2);

        }

        //to add in returned_items table
         $txt_ctrl_no = $_POST['txt_ctrl_no'];
         $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
         $txt_item_no = $_POST['txt_item_no'];
         $return_dropdown_categories = $_POST['return_dropdown_categories'];
         $txt_serial_no = $_POST['txt_serial_no'];
         $txt_item_details = $_POST['txt_item_details'];
         $txt_remarks = $_POST['txt_remarks'];
         $dropdown_status = "RETURNED";
         $date = date("Y-m-d H:i:s", time());
         $returned_by = $_SESSION['username'];

         $log_type = "RETURNED";


        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$returned_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$return_dropdown_categories,$txt_serial_no,$txt_item_details,"",$txt_remarks,$dropdown_status,"","","",$date,$returned_by); 

        query_add($connection,"logs",$array_columns0,$array_column_values0);



        $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status","returned_date","returned_by");
        $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$return_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status,$date,$returned_by);

        query_add($connection,"returned_items",$array_columns,$array_column_values);



        echo"<script>alert('Item Returned Successfully');
                          window.location.href = 'adm_home.php';
                          </script>";
    }
    else
    {
        if(ISSET($_POST['txt_ctrl_no']))
        {

        $txt_ctrl_no = $_POST['txt_ctrl_no'];

        $query = "UPDATE items SET status ='AVAILABLE' WHERE ctrl_no = '$txt_ctrl_no'";
        $query2 = "UPDATE items SET borrowed_by ='' WHERE ctrl_no = '$txt_ctrl_no'";

        $result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query2);

        }

        //to add in returned_items table
         $txt_ctrl_no = $_POST['txt_ctrl_no'];
         $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
         $txt_item_no = $_POST['txt_item_no'];
         $return_dropdown_categories = $_POST['return_dropdown_categories'];
         $txt_serial_no = $_POST['txt_serial_no'];
         $txt_item_details = $_POST['txt_item_details'];
         $txt_remarks = $_POST['txt_remarks'];
         $dropdown_status = "RETURNED";
         $date = date("Y-m-d H:i:s", time());
         $returned_by = $_SESSION['username'];

         $log_type = "RETURNED";


        $array_columns0 = array("log_type","dated_log","log_by","user_id","user_name","department","ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","item_added_date","remarks","status","returning_plan_date","borrowed_date","borrowed_by","returned_date","returned_by");
        $array_column_values0 = array($log_type,$date,$returned_by,"","","",$txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$return_dropdown_categories,$txt_serial_no,$txt_item_details,"",$txt_remarks,$dropdown_status,"","","",$date,$returned_by); 

        query_add($connection,"logs",$array_columns0,$array_column_values0);



        $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status","returned_date","returned_by");
        $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$return_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status,$date,$returned_by);

        query_add($connection,"returned_items",$array_columns,$array_column_values);



        echo"<script>alert('Item Returned Successfully');
                          window.location.href = 'user_home.php';
                          </script>";
    }
}
//-------------------------------------AJAX SELECT DATA FOR RETURN BUTTON MODAL.PHP
if(!empty($_POST['ajax_return_control_no']))
{
    $ctrlno = $_POST['ajax_return_control_no'];
    
    $result =  select_data($connection,"items","*","ctrl_no = '$ctrlno'");
    
    while($row = $result->fetch_assoc() )
    {
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $remarks = $row['remarks'];
    $status = $row['status'];
    $test = $row['test'];
    $borrowed_by = $row['borrowed_by'];
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test,$borrowed_by);
        
    echo json_encode($array_items);

    }
}






?>