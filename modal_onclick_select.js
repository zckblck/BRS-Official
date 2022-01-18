//USE IF GET DATA FROM HTML TABLE ONLY
function UPDATE_MODAL_FUNCTION(id)
{
    /*  .VALUE ONLY WORKS ON TEXTBOXES
    var update_ctrl_no = document.getElementById("update_ctrl_no"+id).value;
    var update_asset_tag_no = document.getElementById("update_asset_tag_no1").text;
    var update_item_no = document.getElementById("update_item_no"+id).value;
    var update_dropdown_categories = document.getElementById("update_dropdown_categories"+id).value;
    var update_serial_no = document.getElementById("update_serial_no"+id).value;
    var update_item_details = document.getElementById("update_item_details"+id).value;
    var update_remarks = document.getElementById("update_remarks"+id).value;
    var update_status = document.getElementById("update_status"+id).value;
    */
    
    
    /* CAN GET VALUE FROM TABLE CELLS/ROWS - javascrpt
    document.getElementById("update_ctrl_no").value = document.getElementById("update_modal_table").rows[id].cells[0].innerHTML;
    document.getElementById("update_asset_tag_no").value = document.getElementById("update_modal_table").rows[id].cells[1].innerHTML;
    document.getElementById("update_item_no").value = document.getElementById("update_modal_table").rows[id].cells[2].innerHTML;
    
    document.getElementById("update_dropdown_categories").value = document.getElementById("update_modal_table").rows[id].cells[3].innerHTML;
    
    document.getElementById("update_serial_no").value = document.getElementById("update_modal_table").rows[id].cells[4].innerHTML;
    document.getElementById("update_item_details").value = document.getElementById("update_modal_table").rows[id].cells[5].innerHTML;
    document.getElementById("update_remarks").value = document.getElementById("update_modal_table").rows[id].cells[6].innerHTML;
    
    document.getElementById("update_status").value = document.getElementById("update_modal_table").rows[id].cells[7].innerHTML;
    */
    
    /*jquery*/
    $(document).ready(function(){
           $("#update_ctrl_no").val(document.getElementById("update_modal_table").rows[id].cells[0].innerHTML);
           $("#update_asset_tag_no").val(document.getElementById("update_modal_table").rows[id].cells[1].innerHTML);
           $("#update_item_no").val(document.getElementById("update_modal_table").rows[id].cells[2].innerHTML);
           $("#update_dropdown_categories").val(document.getElementById("update_modal_table").rows[id].cells[3].innerHTML);
           $("#update_serial_no").val(document.getElementById("update_modal_table").rows[id].cells[4].innerHTML);
           $("#update_item_details").val(document.getElementById("update_modal_table").rows[id].cells[5].innerHTML);
           $("#update_remarks").val(document.getElementById("update_modal_table").rows[id].cells[6].innerHTML);
           $("#update_status").val(document.getElementById("update_modal_table").rows[id].cells[7].innerHTML);
         });
    


}


//-------SELECT TO FETCH DATA FROM HTML TABLE TO TEXTBOXES
function DELETE_MODAL_FUCTION(id)
{

    
    /*jquery*/
    $(document).ready(function(){
           $("#delete_ctrl_no").val(document.getElementById("delete_modal_table").rows[id].cells[0].innerHTML);
           $("#delete_asset_tag_no").val(document.getElementById("delete_modal_table").rows[id].cells[1].innerHTML);
           $("#delete_item_no").val(document.getElementById("delete_modal_table").rows[id].cells[2].innerHTML);
           $("#delete_dropdown_categories").val(document.getElementById("delete_modal_table").rows[id].cells[3].innerHTML);
           $("#delete_serial_no").val(document.getElementById("delete_modal_table").rows[id].cells[4].innerHTML);
           $("#delete_item_details").val(document.getElementById("delete_modal_table").rows[id].cells[5].innerHTML);
           $("#delete_remarks").val(document.getElementById("delete_modal_table").rows[id].cells[6].innerHTML);
           $("#delete_status").val(document.getElementById("delete_modal_table").rows[id].cells[7].innerHTML);
         });
    


}




//jQuery
//$("#html_ID_properties").val()                      - GET data from ID
//$("#html_ID_properties").val("something data")      - SET data from ID
//WORKS ON DROPDOWNS / OPTION


//javascript
//document.getElementById("html_ID_properties").valaue                         - GET data from ID
//document.getElementById("html_ID_properties").value = "something data";      - SET data from ID
// NOT WORKS ON DROPDOWNS / OPTIONS























//=================================================== CURRENTLY IN USE





//-------SELECT TO FETCH DATA FROM DATABASE TABLE TO TEXTBOXES  AJAX UPDATE - UPDATE ITEM MODAL
function AJAX_UPDATE(id)
{
    var control_no = document.getElementById("update_modal_table").rows[id].cells[0].innerHTML;
    
    $( document ).ready(function() {
     $.ajax({
        type: "POST",
        url: 'php_codes.php',
        data: { ajax_update_control_no:control_no },
        success: function(data){
              var data_info = jQuery.parseJSON(data); 
              //alert(data_info);
              
           $("#update_ctrl_no").val(data_info[0]);
           $("#update_asset_tag_no").val(data_info[1]);
           $("#update_item_no").val(data_info[2]);
           $("#update_dropdown_categories").val(data_info[3]);
           $("#update_serial_no").val(data_info[4]);
           $("#update_item_details").val(data_info[5]);
           $("#update_remarks").val(data_info[6]);
           $("#update_status").val(data_info[7]);
            
              
          }
     });
    });
}


//-------SELECT TO FETCH DATA FROM DATABASE TABLE TO TEXTBOXES   AJAX   DELETE - DELETE ITEM MODAL
function AJAX_DELETE(id)
{
    var control_no = document.getElementById("delete_modal_table").rows[id].cells[0].innerHTML;
    
    $( document ).ready(function() {
     $.ajax({
        type: "POST",
        url: 'php_codes.php',
        data: { ajax_delete_control_no:control_no },
        success: function(data){
              var data_info = jQuery.parseJSON(data); 
              //alert(data_info);
              
           $("#delete_ctrl_no").val(data_info[0]);
           $("#delete_asset_tag_no").val(data_info[1]);
           $("#delete_item_no").val(data_info[2]);
           $("#delete_dropdown_categories").val(data_info[3]);
           $("#delete_serial_no").val(data_info[4]);
           $("#delete_item_details").val(data_info[5]);
           $("#delete_remarks").val(data_info[6]);
           $("#delete_status").val(data_info[7]);
            
              
          }
     });
    });
}


//-------SELECT TO FETCH DATA FROM DATABASE TABLE TO TEXTBOXES   AJAX   MANAGE RETURNER
function AJAX_MANAGE_RETURNER(id)
{
    var control_no = document.getElementById("manage_returner_modal_table").rows[id].cells[0].innerHTML;
    
    $( document ).ready(function() {
     $.ajax({
        type: "POST",
        url: 'php_codes.php',
        data: { ajax_manage_returner_control_no:control_no },
        success: function(data){
              var data_info = jQuery.parseJSON(data); 
              //alert(data_info);
              
           $("#manage_returner_UPDATE_user_id").val(data_info[0]);
           $("#manage_returner_UPDATE_user_name").val(data_info[1]);
           $("#manage_returner_UPDATE_password").val(data_info[2]);
           $("#manage_returner_UPDATE_department").val(data_info[3]);

            
              
          }
     });
    });
}









//-------SELECT TO FETCH DATA FROM DATABASE TABLE TO TEXTBOXES   AJAX   BORROW
function AJAX_BORROW(id)
{
    var control_no = document.getElementById("borrow_modal_table").rows[id].cells[0].innerHTML;
    
    $( document ).ready(function() {
     $.ajax({
        type: "POST",
        url: 'php_codes.php',
        data: { ajax_borrow_control_no:control_no },
        success: function(data){
              var data_info = jQuery.parseJSON(data); 
              //alert(data_info);
              
           $("#borrow_ctrl_no").val(data_info[0]);
           $("#borrow_asset_tag_no").val(data_info[1]);
           $("#borrow_item_no").val(data_info[2]);
           $("#borrow_dropdown_categories").val(data_info[3]);
           $("#borrow_serial_no").val(data_info[4]);
           $("#borrow_item_details").val(data_info[5]);
           $("#borrow_remarks").val(data_info[6]);
           $("#borrow_status").val(data_info[7]);
            
              
          }
     });
    });
}



//-------SELECT TO FETCH DATA FROM DATABASE TABLE TO TEXTBOXES   AJAX   RETURN
function AJAX_RETURN(id)
{
    var control_no = document.getElementById("return_modal_table").rows[id].cells[0].innerHTML;
    
    $( document ).ready(function() {
     $.ajax({
        type: "POST",
        url: 'php_codes.php',
        data: { ajax_return_control_no:control_no },
        success: function(data){
              var data_info = jQuery.parseJSON(data); 
              //alert(data_info);
              
           $("#return_ctrl_no").val(data_info[0]);
           $("#return_asset_tag_no").val(data_info[1]);
           $("#return_item_no").val(data_info[2]);
           $("#return_dropdown_categories").val(data_info[3]);
           $("#return_serial_no").val(data_info[4]);
           $("#return_item_details").val(data_info[5]);
           $("#return_remarks").val(data_info[6]);
           $("#return_status").val(data_info[7]);
            
              
          }
     });
    });
}
