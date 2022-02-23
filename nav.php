<?php

require_once('connection.php');
require_once('php_codes.php');
require_once('restriction.php');
require_once('modal.php');

?>


<html>
    
     <head>
            
        <link href="./Bootstrap513/bootstrap.min.css" rel="stylesheet">  <!-- CSS only -->
        <script src="./Bootstrap513/bootstrap.bundle.min.js" ></script>  <!-- JavaScript Bundle with Popper -->
        <script src="./Bootstrap513/jquery.min.js"></script> <!-- JQuery -->
         
        <script type="text/javascript" src="Bootstrap513/charts.loader.js"></script><!-- google charts-->
        <script src="Bootstrap513/chart.min.js"></script> <!-- charts.js -->
         
        <script src="./modal_onclick_select.js"></script> <!-- modal_onclick_select.js -->
         
         
        <script src="./Bootstrap513/moment.min.js"></script> <!-- cdn moment js -->
        <script src="Bootstrap513/bootstrap-datetimepicker.min.js"></script> <!-- cdn js -->
        <script src="Bootstrap513/bootstrap-datetimepicker.min.css"></script> <!-- cdn css -->
         
        <script type="text/javascript" src="Bootstrap513/loader.js"></script> <!--   -->
        <script src="Bootstrap513/jsapi.js"></script> <!--   -->
        <link rel="stylesheet" href="Bootstrap513/bootstrap.min.css"> <!--   -->
         
    </head>
    
    <!--java script -->
    <script>
        

        
        //page transition
        window.transitionToPage = function(href)
        {
        document.querySelector('body').style.opacity = 0
        setTimeout(function() { window.location.href = href}, 200)
        }

        document.addEventListener('DOMContentLoaded', function(event) {
        document.querySelector('body').style.opacity = 1})   
        
        
        
        
        //LIVE SEARCH for UPDATE modal
         $(document).ready(function(){
           $("#txt_search_update").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#update_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for DELETE modal
         $(document).ready(function(){
           $("#txt_search_delete").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#delete_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for BORROW modal
         $(document).ready(function(){
           $("#txt_search_borrow").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#borrow_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for RETURN modal
         $(document).ready(function(){
           $("#txt_search_return").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#return_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for ACTIVITY LOGS modal
         $(document).ready(function(){
           $("#txt_search_activity_logs").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#activity_logs_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for BORROWED LOGS modal
         $(document).ready(function(){
           $("#txt_search_borrowed_logs").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#borrowed_logs_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIVE SEARCH for RETURNED LOGS modal
         $(document).ready(function(){
           $("#txt_search_returned_logs").on("keyup", function() {
                var value = $(this).val().toLowerCase();
             $("#returned_logs_modal_table_tbody tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
        
        //LIMIT PREVIOUS DATE ON BORROW RETURNING_PLAN_DATE
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var minDate= year + '-' + month + '-' + day;

            $('#date_time').attr('min', minDate);
        });
        
    </script>
    
    <body >
    
        <!-- NAVBAR -->
                  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                      <div class="container-fluid">
                          <a class="navbar-brand"><strong>Borrowing System</strong></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page">Home</a>
                            </li>
                              
                              <?php
                                if($_SESSION['ROLE'] == "ADMIN")
                                {
                            ?>
                              
                              <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manage Items</a>
                              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ADD_MODAL" data-bs-whatever="@mdo">Add New Item</a></li> <!-- CHANGE DATA-BS-TARGET NAME == MODAL ID -->
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#UPDATE_MODAL" data-bs-whatever="@mdo">Update</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#DELETE_MODAL" data-bs-whatever="@mdo">Delete</a></li>                
                              </ul>
                            </li>
                              
                              
                              <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Returners
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown"> 
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#MANAGE_RETURNER_MODAL" data-bs-whatever="@mdo">Manage Users</a></li> 
                              </ul>
                            </li>
                              
                              
                              
                              <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">View Logs</a>
                                  
                              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#ACTIVITY_LOGS_MODAL" data-bs-whatever="@mdo">Activity Logs</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#BORROWED_LOGS_MODAL" data-bs-whatever="@mdo">View Borrowed Logs</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#RETURNED_LOGS_MODAL" data-bs-whatever="@mdo">View Returned Logs</a></li>
                                  
                              </ul>
                            </li>
                              
                            <?php
                                }
                            ?>
                              
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown"> 
                                <li><a class="dropdown-item" href="brs_logout.php">Logout</a></li> 
                              </ul>
                            </li>
                              
                            
                              
                            <li class="nav-item">
                              <a class="nav-link disabled"><strong style="color:white">Welcome &nbsp;<?php echo $_SESSION['username']; ?></strong></a>
                            </li>
                          </ul>
                            <?php
                                if($_SESSION['ROLE'] == "ADMIN")
                                {
                            ?>
                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-warning" type="button" name="btn_borrow" data-bs-toggle="modal" data-bs-target="#BORROW_MODAL" data-bs-whatever="@mdo">BORROW</button>
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-danger" type="button" name="btn_return" data-bs-toggle="modal" data-bs-target="#RETURN_MODAL" data-bs-whatever="@mdo">RETURN</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <?php
                                }
                            ?>
                        </div>     
                          
                      </div>
                    </nav>

        
                    <nav class="navbar fixed-bottom navbar-dark bg-dark">
                       <a style="color:white">© all rights reserve 2022</a>
                    </nav> 
    
    
    </body>



</html>






