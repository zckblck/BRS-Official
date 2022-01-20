<?php

require_once('functions.php');



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
        
        
    $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status");
    $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status);
        
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











//-------------------------------------MANAGE RETURNER  ADD BUTTON  MODAL.PHP

if(ISSET($_POST['btn_add_manage_returner']))
{
    if(ISSET($_POST['txt_user_id']) && ISSET($_POST['txt_user_name']) && ISSET($_POST['txt_password']) && ISSET($_POST['dropdown_department']) )
    {
        $txt_user_id = $_POST['txt_user_id'];
        $txt_user_name = $_POST['txt_user_name'];
        $txt_password = $_POST['txt_password'];
        $dropdown_department = $_POST['dropdown_department'];

        $txt_password = sha1($txt_password);

        $array_columns = array("user_id","user_name","pass","department");
        $array_column_values = array($txt_user_id,$txt_user_name,$txt_password,$dropdown_department);

        query_add($connection,"user",$array_columns,$array_column_values);

        echo"<script>alert('User Added Successfully');
                          window.location.href = 'adm_home.php';
                          </script>";
        
    }
}








//-------------------------------------MANAGE RETURNER UPDATE BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_update_manage_returner']))
{
    
    
    if(ISSET($_POST['update_txt_user_id']) && ISSET($_POST['update_txt_user_name']) && ISSET($_POST['update_txt_password']) && ISSET($_POST['update_dropdown_department']) )
    {
        $update_txt_user_id = $_POST['update_txt_user_id'];
        $update_txt_user_name = $_POST['update_txt_user_name'];
        $update_txt_password = $_POST['update_txt_password'];
        $update_dropdown_department = $_POST['update_dropdown_department'];

        $update_txt_password = sha1($update_txt_password);

        
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
    
    if(ISSET($_POST['txt_ctrl_no']))
    {
 
    $txt_ctrl_no = $_POST['txt_ctrl_no'];
        
    $query = "UPDATE items SET status ='BORROWED' WHERE ctrl_no = '$txt_ctrl_no'";

    $result = mysqli_query($connection,$query);
    
    }
    //commit
    
    //to add in borrowed_items table
     $txt_ctrl_no = $_POST['txt_ctrl_no'];
     $txt_asset_tag_no = $_POST['txt_asset_tag_no'];
     $txt_item_no = $_POST['txt_item_no'];
     $borrow_dropdown_categories = $_POST['borrow_dropdown_categories'];
     $txt_serial_no = $_POST['txt_serial_no'];
     $txt_item_details = $_POST['txt_item_details'];
     $txt_remarks = $_POST['txt_remarks'];
     $dropdown_status = "BORROWED";
          
    $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status");
    $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$borrow_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status);
        
    query_add($connection,"borrowed_items",$array_columns,$array_column_values);
    
    
    
    echo"<script>alert('Item Borrowed Successfully');
				      window.location.href = 'user_home.php';
                      </script>"; 
  
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
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test);
        
    echo json_encode($array_items);

    }
}















//-------------------------------------RETURN BUTTON MODAL.PHP //MAIN QUERY

if(ISSET($_POST['btn_return_item']))
{
    
    if(ISSET($_POST['txt_ctrl_no']))
    {
 
    $txt_ctrl_no = $_POST['txt_ctrl_no'];
        
    $query = "UPDATE items SET status ='AVAILABLE' WHERE ctrl_no = '$txt_ctrl_no'";

    $result = mysqli_query($connection,$query);
        
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
          
    $array_columns = array("ctrl_no","asset_tag_no","item_no","category","serial_no","item_details","remarks","status");
    $array_column_values = array($txt_ctrl_no,$txt_asset_tag_no,$txt_item_no,$return_dropdown_categories,$txt_serial_no,$txt_item_details,$txt_remarks,$dropdown_status);
        
    query_add($connection,"returned_items",$array_columns,$array_column_values);
    
    
    
    echo"<script>alert('Item Returned Successfully');
				      window.location.href = 'user_home.php';
                      </script>";
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
        
    $array_items = array($control_no,$asset_tag_no,$item_no,$category,$serial_no,$item_details,$remarks,$status,$test);
        
    echo json_encode($array_items);

    }
}










?>