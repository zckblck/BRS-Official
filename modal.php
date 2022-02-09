<?php 
    require_once('functions.php');
    require_once('export_all_logs.php');
?>


<!---------------------------------------------------------------------ADMIN PAGE

<!--------------------------------------- ADD ITEM MODAL -------------------------------------->
<div class="modal fade" id="ADD_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog">
        
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#228B22">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_ctrl_no" placeholder="Control Number" required >
                  <label for="floatingInput">Control Number</label>
              </div>

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_asset_tag_no" placeholder="Asset Tag Number">
                  <label for="floatingInput">Asset Tag Number</label>
              </div>

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_item_no" placeholder="Item Number" required>
                  <label for="floatingInput">Item Number</label>
              </div>
                
              <div class="form-floating mb-3">
                  <label for="floatingInput">Category :</label>
                  
                  <?php echo create_select_dropdown("SELECT * from categories ",$connection,"dropdown_categories","category","category","form-control","","","","","","text-align:center") ?>
                  
              </div>

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_serial_no" placeholder="Serial Number">
                  <label for="floatingInput">Serial Number</label>
              </div>

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_item_details" placeholder="Item Details">
                  <label for="floatingInput">Item Details</label>
              </div>

              <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" name="txt_remarks" placeholder="Remarks">
                  <label for="floatingInput">Remarks</label>
              </div>

              <div class="form-floating mb-3">
                  <label for="floatingInput">Status :</label>
                    <select class="form-select" aria-label="Default select example" style="text-align:center" name="dropdown_status">
                      <option selected>---</option>
                      <option value="AVAILABLE">AVAILABLE</option>
                      <option value="UNAVAILABLE">UNAVAILABLE</option>
                      <option value="FOR DISPOSAL">FOR DISPOSAL</option>
                      <option value="FOR REPAIR">FOR REPAIR</option>
                      <option value=""></option>
                    </select>
              </div>

         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="btn_add_item" value="ADD ITEM">ADD</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>







<!--------------------------------------- UPDATE ITEM MODAL -------------------------------------->
<div class="modal fade" id="UPDATE_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#1E90FF">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Update Item</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_update" id="txt_search_update">         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                     <div class="form-floating mb-3">
                          <input id="update_ctrl_no" type="text" class="form-control"  name="txt_ctrl_no" placeholder="Control Number" readonly  />
                          <label for="update_ctrl_no">Control Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="update_asset_tag_no" type="text" class="form-control"  name="txt_asset_tag_no" placeholder="Asset Tag Number" />
                          <label for="update_asset_tag_no">Asset Tag Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="update_item_no" type="text" class="form-control"  name="txt_item_no" placeholder="Item Number" required  />
                          <label for="update_item_no">Item Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <label for="update_dropdown_categories">Category :</label>

                          <?php echo create_select_dropdown("SELECT * from categories ",$connection,"dropdown_categories","category","category","form-control","update_dropdown_categories","","","","","text-align:center") ?>

                      </div>

                      <div class="form-floating mb-3">
                          <input id="update_serial_no" type="text" class="form-control"  name="txt_serial_no" placeholder="Serial Number" />
                          <label for="update_serial_no">Serial Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="update_item_details" type="text" class="form-control"  name="txt_item_details" placeholder="Item Details" / >
                          <label for="update_item_details">Item Details</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="update_remarks" type="text" class="form-control"  name="txt_remarks" placeholder="Remarks" / >
                          <label for="update_remarks">Remarks</label>
                      </div>

                      <div class="form-floating mb-3">
                          <label for="floatingInput">Status :</label>
                            <select id="update_status" class="form-select" aria-label="Default select example" style="text-align:center" name="dropdown_status" required>
                              <option selected>---</option>
                              <option value="AVAILABLE">AVAILABLE</option>
                              <option value="UNAVAILABLE">UNAVAILABLE</option>
                              <option value="FOR DISPOSAL">FOR DISPOSAL</option>
                              <option value="FOR REPAIR">FOR REPAIR</option>
                              <option value=""></option>
                            </select>
                      </div>
                    
                </div>
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                    Select to view
                        <table id="update_modal_table" class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th style="font-size:13px">CONTROL NUMBER</th>
                                    <th style="font-size:13px">ASSET TAG NUMBER</th>
                                    <th style="font-size:13px">ITEM NUMBER</th>
                                    <th style="font-size:13px">CATEGORY</th>
                                    <th style="font-size:13px">SERIAL NUMBER</th>
                                    <th style="font-size:13px">ITEM DETAILS</th>
                                    <th style="font-size:13px">REMARKS</th>
                                    <th style="font-size:13px">STATUS</th>
                                    <th style="font-size:13px">CURRENTLY BORROWED BY</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="update_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_update ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btn_update_item" value="UPDATE ITEM">UPDATE</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>
                              




<!--------------------------------------- DELETE ITEM MODAL -------------------------------------->
<div class="modal fade" id="DELETE_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#8B0000">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Delete Item</h5>
            <input type="search" class="form-control" placeholder="Search" name="txt_search_delete" id="txt_search_delete">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                     <div class="form-floating mb-3">
                          <input id="delete_ctrl_no" type="text" class="form-control"  name="txt_ctrl_no" placeholder="Control Number" readonly  />
                          <label for="delete_ctrl_no">Control Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="delete_asset_tag_no" type="text" class="form-control"  name="txt_asset_tag_no" placeholder="Asset Tag Number" readonly />
                          <label for="delete_asset_tag_no">Asset Tag Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="delete_item_no" type="text" class="form-control"  name="txt_item_no" placeholder="Item Number" readonly  />
                          <label for="delete_item_no">Item Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <label for="delete_dropdown_categories">Category :</label>

                          <?php echo create_select_dropdown("SELECT * from categories ",$connection,"dropdown_categories","category","category","form-control","delete_dropdown_categories","","","","","text-align:center","disabled") ?>

                      </div>

                      <div class="form-floating mb-3">
                          <input id="delete_serial_no" type="text" class="form-control"  name="txt_serial_no" placeholder="Serial Number" readonly />
                          <label for="delete_serial_no">Serial Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="delete_item_details" type="text" class="form-control"  name="txt_item_details" placeholder="Item Details" readonly / >
                          <label for="delete_item_details">Item Details</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="delete_remarks" type="text" class="form-control"  name="txt_remarks" placeholder="Remarks" readonly / >
                          <label for="delete_remarks">Remarks</label>
                      </div>

                      <div class="form-floating mb-3">
                          <label for="floatingInput">Status :</label>
                            <select id="delete_status" class="form-select" aria-label="Default select example" style="text-align:center" name="dropdown_status" disabled>
                              <option selected>---</option>
                              <option value="AVAILABLE">AVAILABLE</option>
                              <option value="UNAVAILABLE">UNAVAILABLE</option>
                              <option value="FOR DISPOSAL">FOR DISPOSAL</option>
                              <option value="FOR REPAIR">FOR REPAIR</option>
                              <option value=""></option>
                            </select>
                      </div>
                    
                </div>
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                    Select to Delete
                        <table id="delete_modal_table" class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th>CONTROL NUMBER</th>
                                    <th>ASSET TAG NUMBER</th>
                                    <th>ITEM NUMBER</th>
                                    <th>CATEGORY</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>ITEM DETAILS</th>
                                    <th>REMARKS</th>
                                    <th>STATUS</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="delete_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_delete ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="btn_delete_item" value="DELETE ITEM">DELETE</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>



<!---------------------------------------  MANAGE RETURNER MODAL -------------------------------------->
<div class="modal fade" id="MANAGE_RETURNER_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-lg">
        
        <!------------------  ADD RETURNER FORM --------------------------->
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#228B22">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Add User "Returners"</h5>             
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"><!--   style="height: 280px !important; overflow-y: scroll" -->
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                          <input id="manage_returner_ADD_user_id" type="text" class="form-control"  name="txt_user_id" placeholder="User ID"  required/>
                          <label for="manage_returner_ADD_user_id">User ID</label>
                      </div>
                    
                     <div class="form-floating mb-3">
                          <input id="manage_returner_ADD_user_name" type="text" class="form-control"  name="txt_user_name" placeholder="User Name"  required/>
                          <label for="manage_returner_ADD_user_name">User Name</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="manage_returner_ADD_password" type="password" class="form-control"  name="txt_password" placeholder="Password" required/>
                          <label for="manage_returner_ADD_password">Password</label>
                      </div>
                    

                    <div class="form-floating mb-3">
                          <label for="manage_returner_ADD_department">Department :</label>

                          <?php echo create_select_dropdown("SELECT * from department ",$connection,"dropdown_department","department","department","form-control","manage_returner_ADD_department","","","","","text-align:center") ?>

                      </div>

                      
                </div>
                
                
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="btn_add_manage_returner" >ADD USER</button>
        </div>
      </div>
            
    </form>
        
          <!------------------  UPDATE RETURNER FORM ---------------------------> 
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#1E90FF">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Update User "Returners"</h5>                
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"><!--   style="height: 280px !important; overflow-y: scroll" -->
            <div class="row">
                <div class="col-4">
                    <div class="form-floating mb-3">
                          <input id="manage_returner_UPDATE_user_id" type="text" class="form-control"  name="update_txt_user_id" placeholder="User ID"  readonly/>
                          <label for="manage_returner_UPDATE_user_id">User ID</label>
                      </div>
                    
                     <div class="form-floating mb-3">
                          <input id="manage_returner_UPDATE_user_name" type="text" class="form-control"  name="update_txt_user_name" placeholder="User Name"  />
                          <label for="manage_returner_UPDATE_user_name">User Name</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="manage_returner_UPDATE_password" type="password" class="form-control"  name="update_txt_password" placeholder="Password" />
                          <label for="manage_returner_UPDATE_password">Password</label>
                      </div>
                    
                    <div class="form-floating mb-3">
                          <label for="manage_returner_UPDATE_department">Department :</label>

                          <?php echo create_select_dropdown("SELECT * from department ",$connection,"update_dropdown_department","department","department","form-control","manage_returner_UPDATE_department","","","","","text-align:center") ?>

                      </div>

                      
                </div>
                
                
                <div class="col" style="overflow:scroll ; height:300px">
                    <!-- Table Grid-->
                    Select to view
                        <table id="manage_returner_modal_table" class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th>USER ID</th>
                                    <th>USER NAME</th>
                                    <th>PASSWORD (ENCRYPTED)</th>
                                    <th>DEPARTMENT</th>
                                    
                                </tr>
                            </thead>
                            <tbody style="text-align:center" padding: 70px 0;>
                                <?php echo $tr_manage_returner ?>
                            </tbody> 
                        </table>
                </div>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btn_update_manage_returner" >UPDATE USER</button>
        </div>
      </div>
            
    </form>    
        
        
</div>
         
</div>



<!--------------------------------------- ACTIVITY LOGS MODAL -------------------------------------->
<div class="modal fade" id="ACTIVITY_LOGS_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#597567">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Activity Logs</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_activity_logs" id="txt_search_activity_logs"> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                        <table class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th style="font-size:13px">LOG TYPE</th>
                                    <th style="font-size:13px">LOG DATE</th>
                                    <th style="font-size:13px">LOG BY</th>
                                    <th style="font-size:13px">USER ID</th>
                                    <th style="font-size:13px">USER NAME</th>
                                    <th style="font-size:13px">DEPARTMENT</th>
                                    <th style="font-size:13px">CONTROL NUMBER</th>
                                    <th style="font-size:13px">ASSET TAG NUMBER</th>
                                    <th style="font-size:13px">ITEM NUMBER</th>
                                    <th style="font-size:13px">CATEGORY</th>
                                    <th style="font-size:13px">SERIAL NUMBER</th>
                                    <th style="font-size:13px">ITEM DETAILS</th>
                                    <th style="font-size:13px">ITEM ADDED DATE</th>
                                    <th style="font-size:13px">REMARKS</th>
                                    <th style="font-size:13px">STATUS</th>
                                    <th style="font-size:13px">RETURNING PLAN DATE</th>
                                    <th style="font-size:13px">BORROWED DATE</th>
                                    <th style="font-size:13px">BORROWED BY</th>
                                    <th style="font-size:13px">RETURNED DATE</th>
                                    <th style="font-size:13px">RETURNED BY</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="activity_logs_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_activity_logs ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          
        </div>
        <div class="modal-footer">
          <a class="btn btn-success" href="<?php echo $filename; ?>" target="_blank" download><strong>Export to Excel</strong></a>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>


<!--------------------------------------- BORROWED LOGS MODAL -------------------------------------->
<div class="modal fade" id="BORROWED_LOGS_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#FFD700">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Borrowed Logs</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_borrowed_logs" id="txt_search_borrowed_logs">         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                        <table class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th style="font-size:13px">CONTROL NUMBER</th>
                                    <th style="font-size:13px">ASSET TAG NUMBER</th>
                                    <th style="font-size:13px">ITEM NUMBER</th>
                                    <th style="font-size:13px">CATEGORY</th>
                                    <th style="font-size:13px">SERIAL NUMBER</th>
                                    <th style="font-size:13px">ITEM DETAILS</th>
                                    <th style="font-size:13px">REMARKS</th>
                                    <th style="font-size:13px">STATUS</th>
                                    <th style="font-size:13px">RETURNING PLAN DATE</th>
                                    <th style="font-size:13px">BORROWED DATE</th>
                                    <th style="font-size:13px">BORROWED BY</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="borrowed_logs_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_borrowed_items_logs ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>



<!--------------------------------------- RETURNED LOGS MODAL -------------------------------------->
<div class="modal fade" id="RETURNED_LOGS_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#A52A2A">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Returned Logs</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_returned_logs" id="txt_search_returned_logs">         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                        <table class="table table-hover table-striped border-dark" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th style="font-size:13px">CONTROL NUMBER</th>
                                    <th style="font-size:13px">ASSET TAG NUMBER</th>
                                    <th style="font-size:13px">ITEM NUMBER</th>
                                    <th style="font-size:13px">CATEGORY</th>
                                    <th style="font-size:13px">SERIAL NUMBER</th>
                                    <th style="font-size:13px">ITEM DETAILS</th>
                                    <th style="font-size:13px">REMARKS</th>
                                    <th style="font-size:13px">STATUS</th>
                                    <th style="font-size:13px">RETURNED DATE</th>
                                    <th style="font-size:13px">RETURNED BY</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="returned_logs_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_returned_items_logs ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>














<!---------------------------------------------------------------------USER PAGE

<!--------------------------------------- BORROW ITEM MODAL -------------------------------------->
<div class="modal fade" id="BORROW_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#FFD700">
          <h5 class="modal-title" id="exampleModalLabel">Borrow Item</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_borrow" id="txt_search_borrow">         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                     <div class="form-floating mb-3">
                          <input id="borrow_ctrl_no" type="text" class="form-control"  name="txt_ctrl_no" placeholder="Control Number" readonly  />
                          <label for="borrow_ctrl_no">Control Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="borrow_asset_tag_no" type="text" class="form-control"  name="txt_asset_tag_no" placeholder="Asset Tag Number" readonly/>
                          <label for="borrow_asset_tag_no">Asset Tag Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="borrow_item_no" type="text" class="form-control"  name="txt_item_no" placeholder="Item Number" readonly  />
                          <label for="borrow_item_no">Item Number</label>
                      </div>
                    
                    <div class="form-floating mb-3">
                          <input id="borrow_dropdown_categories" type="text" class="form-control"  name="borrow_dropdown_categories" placeholder="Category" readonly  />
                          <label for="borrow_dropdown_categories">Category</label>
                      </div>
                    

                      <div class="form-floating mb-3">
                          <input id="borrow_serial_no" type="text" class="form-control"  name="txt_serial_no" placeholder="Serial Number" readonly/>
                          <label for="borrow_serial_no">Serial Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="borrow_item_details" type="text" class="form-control"  name="txt_item_details" placeholder="Item Details" readonly/ >
                          <label for="borrow_item_details">Item Details</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="borrow_remarks" type="text" class="form-control"  name="txt_remarks" placeholder="Remarks" readonly/ >
                          <label for="borrow_remarks">Remarks</label>
                      </div>
                    
                    <div class="form-floating mb-3">
                          <input id="borrow_status" type="text" class="form-control"  name="dropdown_status" placeholder="Status" readonly/ >
                          <label for="borrow_status">Status</label>
                      </div>
                    
                      <div class="form-floating mb-3">
                          <input id="date_time" type="date" class="form-control"  name="borrow_date_time" placeholder="Returning Plan Date" required / >
                          <label for="date_time">Returning Plan Date</label>
                      </div>

                </div>
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                        <table id="borrow_modal_table" class="table table-hover" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th>CONTROL NUMBER</th>
                                    <th>ASSET TAG NUMBER</th>
                                    <th>ITEM NUMBER</th>
                                    <th>CATEGORY</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>ITEM DETAILS</th>
                                    <th>REMARKS</th>
                                    <th>STATUS</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="borrow_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_borrow ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          


         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" name="btn_borrow_item" value="BORROW ITEM">BORROW</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>




<!--------------------------------------- RETURN ITEM MODAL -------------------------------------->
<div class="modal fade" id="RETURN_MODAL" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none"> <!-- CHANGE ID NAME FOR MODAL -->
    <div class="modal-dialog modal-xl">
        
    <form class="form-control"  method="post"  action="php_codes.php">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#A52A2A">
          <h5 class="modal-title" id="exampleModalLabel" style="color:white">Return Item</h5>       
            <input type="search" class="form-control" placeholder="Search" name="txt_search_return" id="txt_search_return">         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                     <div class="form-floating mb-3">
                          <input id="return_ctrl_no" type="text" class="form-control"  name="txt_ctrl_no" placeholder="Control Number" readonly  />
                          <label for="return_ctrl_no">Control Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="return_asset_tag_no" type="text" class="form-control"  name="txt_asset_tag_no" placeholder="Asset Tag Number" readonly/>
                          <label for="return_asset_tag_no">Asset Tag Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="return_item_no" type="text" class="form-control"  name="txt_item_no" placeholder="Item Number" readonly  />
                          <label for="return_item_no">Item Number</label>
                      </div>
                    
                    <div class="form-floating mb-3">
                          <input id="return_dropdown_categories" type="text" class="form-control"  name="return_dropdown_categories" placeholder="Category" readonly  />
                          <label for="return_dropdown_categories">Category</label>
                      </div>


                      <div class="form-floating mb-3">
                          <input id="return_serial_no" type="text" class="form-control"  name="txt_serial_no" placeholder="Serial Number" readonly/>
                          <label for="return_serial_no">Serial Number</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="return_item_details" type="text" class="form-control"  name="txt_item_details" placeholder="Item Details" readonly/ >
                          <label for="return_item_details">Item Details</label>
                      </div>

                      <div class="form-floating mb-3">
                          <input id="return_remarks" type="text" class="form-control"  name="txt_remarks" placeholder="Remarks" readonly/ >
                          <label for="return_remarks">Remarks</label>
                      </div>
                    
                    <div class="form-floating mb-3">
                          <input id="return_status" type="text" class="form-control"  name="dropdown_status" placeholder="Status" readonly/ >
                          <label for="return_status">Status</label>
                      </div>

                </div>
                
                <div class="col" style="overflow:scroll ; height:650px">
                    <!-- Table Grid-->
                        <table id="return_modal_table" class="table table-hover" border=1>
                            
                            <thead>
                                <tr style="text-align:center" padding: 70px 0;>
                                    <th>CONTROL NUMBER</th>
                                    <th>ASSET TAG NUMBER</th>
                                    <th>ITEM NUMBER</th>
                                    <th>CATEGORY</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>ITEM DETAILS</th>
                                    <th>REMARKS</th>
                                    <th>STATUS</th>
                                    <th>CURRENTLY BORROWED BY</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody id="return_modal_table_tbody" style="text-align:center">
                                
                                <?php echo $tr_return ?>
                                
                            </tbody>
                            
                        </table>
                </div>
                
            </div>
          


         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" name="btn_return_item" value="RETURN ITEM">RETURN</button>
        </div>
      </div>
            
    </form>
</div>
         
</div>











