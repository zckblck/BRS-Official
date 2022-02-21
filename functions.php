<?php

require_once('connection.php');


//------------------------------------------LDAP connection to DOMAIN 
if (session_status() == PHP_SESSION_NONE) 
{
    session_start();
}
function loginAccount($username, $password)
{
    
     
        global $connection;
		$adServer = "ldap://petsvr1100.petcad1100";

        $ldap = ldap_connect($adServer);
        $ldaprdn = 'petcad1100' . "\\" . $username;

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        $bind = @ldap_bind($ldap, $ldaprdn, $password);
        if ($bind) {
            $filter="(sAMAccountName=$username)";
            $result = ldap_search($ldap,"dc=petcad1100",$filter);
            ldap_sort($ldap,$result,"sn");
            $info = ldap_get_entries($ldap, $result);

            for ($i=0; $i<$info["count"]; $i++){
                $cn	= $info[$i]["cn"][0];
                $firstname = $info[$i]["givenname"][0];
                $middlename = isset($info[$i]["initials"][0]);
                $lastname = $info[$i]["sn"][0];
                $ldap_displayname = $info[$i]["displayname"][0];
                //$ldap_derpartment = isset($info[$i]["department"][0]);
                //@ldap_close($ldap);
                //
                }
                         
            	$_SESSION["username"] = $username;
            	$_SESSION["ROLE"] = "LDAP_USER"; //session for LDAP user
                return $username;
                
            }
    
            else 
            {    
                return false;
            }

}


//------------------------------------------ function for admin login
function loginAdmin($username, $password, $connection)
{
    $password = sha1($password);

    $query4 = "SELECT * FROM admin WHERE adm_name = '$username' AND pass = '$password'";

    $result4 = mysqli_query($connection,$query4);
            
    if(mysqli_num_rows($result4) > 0)
    {
        $_SESSION['username'] = $username;  //session  
        $_SESSION['ROLE'] = "ADMIN";  //session for admin
        
        
        return $username;
                
    }
    else
    {
        return false;
    }

}


//------------------------------------------ function for user login
function loginUser($username, $password, $connection)
{
    
    $password = sha1($password);

    $query = "SELECT * FROM user WHERE user_name = '$username' AND pass = '$password'";
    //$query = "SELECT * FROM emp_info WHERE pet_id = '$username'";      //for DATABASE-LDAP login

    $result = mysqli_query($connection,$query);
            
    if(mysqli_num_rows($result) > 0)
      {
                $_SESSION['username'] = $username;  //session 
                $_SESSION["ROLE"] = "USER";  //session for user
        
                //return loginAccount($username, $password);     //for DATABASE-LDAP login
            
                return $username;
        
        
      }
      else 
      {
        return false;
      }
}

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


//------------------------------------------------------------function for dropdown
function create_select_dropdown($query,$conn,$name,$value,$text,$class="",$id="",$selected_value="",$selected_val_compare_to="",$onchange="",$required="",$style="",$readonly="")
{
    
    $select_list ="";
    $select_option="";
    $select_selected = "";
	
	
	if($query =="")
	{
		return "<B>Error:</B> Query not set";
	
	}
	if($conn =="")
	{
		return "<B>Error:</B> connection not set";
	}
	if($name =="")
	{
		return "<B>Error:</B>dropdown Name not set";
	}
	if($value =="")
	{
		return "<B>Error:</B>Option value not set";
	}
	if($text =="")
	{
		return "<B>Error:</B>Option Text not set";
	}
	
    
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
           while($row = $result->fetch_assoc()) {
                    
                    if($selected_val_compare_to !=""){
                        
                          if($selected_value == $row[$selected_val_compare_to])
                            {
                        
                                $select_selected = "selected";
                            }
                        
                    }
                  
                    $select_option .="<option value='".$row[$value]."' ".$select_selected." style='".$style."' >".$row[$text]."</option>";
                    
                    $select_selected = "";
                    
                 }
    $select_list ="<select class='".$class."' id='".$id."' name='".$name."' onchange='".$onchange."' $required $readonly>
                            <option>--</option>
                                ".$select_option."
                    </select>";
    return $select_list;
    
}




function query_add($conn,$table_name,$columns,$column_values)
{
	if($conn =="")
	{
		return "<B>query_add:</B> connection not set";
	
	}
	if($table_name =="")
	{
		return "<B>query_add:</B> table name not set";
	}
	if(count($columns) == 0)
	{
		return "<B>query_add:</B>columns array not set";
	}
	if(count($column_values)==0)
	{
		return "<B>query_add:</B>column values not set";
	}

	
	if(count($columns)<count($column_values) || count($columns)>count($column_values)  )
	{
		return "<script>
					alert('PHP query_add:column and values to insert not match');
				</script>";
	}
	$columns_to_input = "";
	$values_to_input = "";
	for($i=0;$i<=count($columns)-1;$i++)
	{
		//echo $i;
		if((count($columns) - $i)  ==1 )
		{
			$columns_to_input .= $columns[$i]."";
			$values_to_input .= "'".$column_values[$i]."'";
	
		}
		else
		{
		$columns_to_input .= $columns[$i].",";
		$values_to_input .= "'".$column_values[$i]."',";
	
		}
		
	}
	//echo $columns_to_input." ".$values_to_input;
  $result = mysqli_query($conn, "INSERT INTO $table_name ($columns_to_input) VALUES($values_to_input)" ) or die(mysqli_error($conn));    
 
	
}



function query_update($conn,$table_name,$columns,$column_values,$condition)
{
	if($conn =="")
	{
		return "<B>query_update:</B> connection not set";
	
	}
	if($table_name =="")
	{
		return "<B>query_update:</B> table name not set";
	}
	if(count($columns) == 0)
	{
		return "<B>query_update:</B>columns array not set";
	}
	if(count($column_values)==0)
	{
		return "<B>query_update:</B>column values not set";
	}
	if($condition=="")
	{
		return "<B>query_update:</B>condition not set";
	}
	
	if(count($columns)<count($column_values) || count($columns)>count($column_values)  )
	{
		return "<script>
					alert('query_update:column and values to insert not match');
				</script>";
		
	}

	
	
	$query_to_input = "";
	
	for($i=0;$i<=count($columns)-1;$i++)
	{
		
		$query_to_input .= $columns[$i]."='".$column_values[$i]."', ";
		if((count($columns)-$i)  ==1  )
		{
				$query_to_input .= $columns[$i]."='".$column_values[$i]."'";
		}
		
	}
	
  $result = mysqli_query($conn, "UPDATE $table_name SET $query_to_input WHERE $condition" ) or die(mysqli_error($conn));    
 
}



function query_delete($conn,$table_name,$condition)
{
	if($conn =="")
	{
		return "<B>query_delete:</B> connection not set";
	
	}
	if($table_name =="")
	{
		return "<B>query_delete:</B> table name not set";
	}

	if($condition=="")
	{
		return "<B>query_delete:</B>condition not set";
	}
	
$result = mysqli_query($conn, "DELETE FROM $table_name  WHERE $condition" ) or die(mysqli_error($conn));    
 
}




//columns in condition , data values to check in columns 
function select_data($conn,$table_name,$selected_columns,$condition="1")
{
	if($conn =="")
	{
		return "<B>PHP select_data:</B> connection not set";
	
	}
	if($table_name =="")
	{
		return "<B>PHP select_data:</B> table name not set";
	}	
	if($selected_columns =="")
	{
		return "<B>PHP select_data:</B> table name not set";
	}	
	if($condition =="")
	{
		return "<B>PHP select_data:</B> table name not set";
	}
	$result = mysqli_query($conn, "SELECT $selected_columns FROM $table_name WHERE $condition" ) or die(mysqli_error($conn));    
 
	return $result;
}




function count_data($conn,$table_name,$condition)
{
	if($conn =="")
	{
		return "<B>PHP count_data:</B> connection not set";
	
	}
	if($table_name =="")
	{
		return "<B>PHP count_data:</B> table name not set";
	}	
	if($condition =="")
	{
		return "<B>PHP count_data:</B> table name not set";
	}
	$result = mysqli_query($conn, "SELECT * FROM $table_name WHERE $condition" ) or die(mysqli_error($conn));    
	$row_count = mysqli_num_rows($result);
	return $row_count;
}


/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


//------------------display on table on user_home.php
$tr_item = "";
if(ISSET($_POST['btn_filter']))
{
    $dropdowncategory = $_POST['dropdown_categories'];

    $query = "SELECT * FROM items WHERE category LIKE '%$dropdowncategory%' AND status = 'AVAILABLE'";

    $result = mysqli_query($connection,$query );
 
    while($row = $result->fetch_assoc() )
    {
        $control_no = $row['ctrl_no'];
        $asset_tag_no = $row['asset_tag_no'];
        $item_no = $row['item_no'];
        $category = $row['category'];
        $serial_no = $row['serial_no'];
        $item_details = $row['item_details'];
        $status = $row['status'];

        //to click on table
        $tr_item .= "<tr>
                        <td>$control_no</td>
                        <td>$asset_tag_no</td>
                        <td>$item_no</td>
                        <td style='font-style:oblique;font-weight:bold'>$category</td>
                        <td>$serial_no</td>
                        <td>$item_details</td>
                        <td style='font-weight:bold'>$status</td>
                    </tr>  "; 
    }
 
    
}




//------------------display on table on UPDATE ITEM MODAL adm_home.php
$query = "SELECT * FROM items";

$result = mysqli_query($connection,$query);

$tr_update = "";
$counter = 0;
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
    $borrowed_by = $row['borrowed_by'];
    
    $counter++;

    //to click on table
    $tr_update .= "<tr onclick='AJAX_UPDATE($counter)'>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
            <td style='font-weight:bold'>$borrowed_by</td>
        </tr>  "; 
    }



//------------------display on table on DELETE ITEM MODAL adm_home.php
$query = "SELECT * FROM items";

$result = mysqli_query($connection,$query);

$tr_delete = "";
$counter = 0;
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
    
    $counter++;

    //to click on table
    $tr_delete .= "<tr onclick='AJAX_DELETE($counter)'>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
        </tr>  "; 
    }




//------------------display on table on MANAGE RETURNER MODAL adm_home.php
$query = "SELECT * FROM user";

$result = mysqli_query($connection,$query);

$tr_manage_returner = "";
$counter = 0;
while($row = $result->fetch_assoc() )
{
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $pass = $row['pass'];
    $department = $row['department'];
    
    $counter++;

    //to click on table
    $tr_manage_returner .= "<tr onclick='AJAX_MANAGE_RETURNER($counter)'>
            <td style='font-style:oblique;font-weight:bold'>$user_id</td>
            <td>$user_name</td>
            <td>$pass</td>
            <td>$department</td>
        </tr>  "; 
    }




//------------------display on table on ACTIVITY LOGS MODAL adm_home.php
$query = "SELECT * FROM logs";

$result = mysqli_query($connection,$query);

$tr_activity_logs = "";

while($row = $result->fetch_assoc() )
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
    
    $tr_activity_logs .= "<tr>
            <td style='font-weight:bold'>$log_type</td>
            <td>$dated_log</td>
            <td>$log_by</td>
            <td>$user_id</td>
            <td>$user_name</td>
            <td>$department</td>
            <td>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$item_added_date</td>
            <td>$remarks</td>
            <td>$status</td>
            <td>$returning_plan_date</td>
            <td>$borrowed_date</td>
            <td>$borrowed_by</td>
            <td>$returned_date</td>
            <td>$returned_by</td>
        </tr>  "; 
    }








//------------------display on table on BORROWED LOGS MODAL adm_home.php
$query = "SELECT * FROM borrowed_items";

$result = mysqli_query($connection,$query);

$tr_borrowed_items_logs = "";

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
    $returning_plan_date = $row['returning_plan_date'];
    $borrowed_date = $row['borrowed_date'];
    $borrowed_by = $row['borrowed_by'];
    
    $tr_borrowed_items_logs .= "<tr>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
            <td>$returning_plan_date</td>
            <td>$borrowed_date</td>
            <td>$borrowed_by</td>
        </tr>  "; 
    }






//------------------display on table on RETURNED LOGS MODAL adm_home.php
$query = "SELECT * FROM returned_items";

$result = mysqli_query($connection,$query);

$tr_returned_items_logs = "";

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
    $returned_date = $row['returned_date'];
    $returned_by = $row['returned_by'];
    
    $tr_returned_items_logs .= "<tr>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
            <td>$returned_date</td>
            <td>$returned_by</td>
        </tr>  "; 
    }





//------------------display on table on ON-GOING REPAIR TABLE in adm_home.php
$query = "SELECT * FROM items WHERE status = 'UNDER REPAIR'";

$result = mysqli_query($connection,$query);

$tr_showOnGoingRepair = "";

while($row = $result->fetch_assoc() )
{
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $status = $row['status'];

    $tr_showOnGoingRepair .= "<tr>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$status</td>
        </tr>  "; 
    }



//------------------display on table on FOR DISPOSAL  TABLE in adm_home.php
$query = "SELECT * FROM items WHERE status = 'FOR DISPOSAL'";

$result = mysqli_query($connection,$query);

$tr_showForDisposal = "";

while($row = $result->fetch_assoc() )
{
    $control_no = $row['ctrl_no'];
    $asset_tag_no = $row['asset_tag_no'];
    $item_no = $row['item_no'];
    $category = $row['category'];
    $serial_no = $row['serial_no'];
    $item_details = $row['item_details'];
    $status = $row['status'];

    $tr_showForDisposal .= "<tr>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$status</td>
        </tr>  "; 
    }









//------------------display on table on BORROW MODAL user_home.php
$query = "SELECT * FROM items WHERE status = 'AVAILABLE'";

$result = mysqli_query($connection,$query);

$tr_borrow = "";
$counter = 0;
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
    
    $counter++;

    //to click on table
    $tr_borrow .= "<tr onclick='AJAX_BORROW($counter)'>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
        </tr>  "; 
    }



//------------------display on table on RETURN MODAL user_home.php
$query = "SELECT * FROM items WHERE status = 'BORROWED'";

$result = mysqli_query($connection,$query);

$tr_return = "";
$counter = 0;
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
    $borrowed_by = $row['borrowed_by'];
    
    $counter++;

    //to click on table
    $tr_return .= "<tr onclick='AJAX_RETURN($counter)'>
            <td style='font-weight:bold'>$control_no</td>
            <td>$asset_tag_no</td>
            <td>$item_no</td>
            <td style='font-style:oblique;font-weight:bold'>$category</td>
            <td>$serial_no</td>
            <td>$item_details</td>
            <td>$remarks</td>
            <td>$status</td>
            <td style='font-weight:bold'>$borrowed_by</td>
        </tr>  "; 
    }



?>