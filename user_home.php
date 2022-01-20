<?php

require_once('nav.php');

?>







<html>
    <head>
        <title>Borrowing System</title>
    </head>
    
    
    
    
    <body>

        
        
          <div class="container">
              
              
              <!-- ROW 1 -->
              <div class="row" style="height:55px">
              </div>

              
              <!-- ROW 2 -->
              <div class="row">
                  <div class="col">
                      <div class="row">
                          <div class="col" style="height:750px">
                              <a type="button" class="btn btn-warning btn-lg" name="btn_borrow"  style="height:100% ; width:300px" data-bs-toggle="modal" data-bs-target="#BORROW_MODAL" data-bs-whatever="@mdo"><br><br><br><br><br><br><br><br><br><br><br>Borrow</a>
                              <?php 
                              if($_SESSION['ROLE'] == "USER"){ 
                              ?>
                              <a type="button" class="btn btn-danger btn-lg" name="btn_return" style="height:100% ; width:300px" data-bs-toggle="modal" data-bs-target="#RETURN_MODAL" data-bs-whatever="@mdo"><br><br><br><br><br><br><br><br><br><br><br>Return</a> 
                              <?php 
                              } 
                              if($_SESSION['ROLE'] == "LDAP_USER"){
                              ?>
                              <a type="button" class="btn btn-info btn-lg" style="height:100% ; width:300px"  disabled><br><br><br><br><br><br><br><br><br><br><br>"You can only Return on Authorized Department User" </a>
                              <?php
                              }
                              ?>
                          </div>
  
                      </div>
                      
                  </div>
                  
                  
                  <div class="col">
                      
                    <div class="row" style="height:35px"><strong>SELECT TO VIEW AVAILABLE ITEMS</strong>
                    </div>
                      
                    <form method="post">
                        <div class="row">
                            <div class="col">
                                <?php echo create_select_dropdown("SELECT * from categories ",$connection,"dropdown_categories","category","category","form-control") ?> 
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-success" type="submit" name="btn_filter">Filter</button>
                            </div>
                        
                        </div>
                        
                    </form>
                    
                      
                    <div class="row" style="height:35px">
                    </div>
                      
                    <div class="row">
                        <!-- Table Grid-->
                        <table class="table table-hover" border=1>
                            
                            <thead>
                                <tr style="text-align:center">
                                    <th>CONTROL NUMBER</th>
                                    <th>ASSET TAG NUMBER</th>
                                    <th>ITEM NUMBER</th>
                                    <th>CATEGORY</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>ITEM DETAILS</th>
                                    <th>STATUS</th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php echo $tr_item ?>
                            </tbody>
                            
                        </table>
                    </div>
                      
                  </div>
                  
                  

                  
                  
                  
              </div>
              
      
         </div><!-- DIV CLASS CONTAINER-->
   
     
    </body>
    
    
</html>
