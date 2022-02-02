<?php

require_once('connection.php');

?>


<html>

    <head>
    
    <title>Login</title>
        
        <link href="./Bootstrap513/bootstrap.min.css" rel="stylesheet">  <!-- CSS only -->
        <script src="./Bootstrap513/bootstrap.bundle.min.js" ></script>  <!-- JavaScript Bundle with Popper -->
    
    </head>
    
    
    
    <body>
        <nav class="topbar">
            <div class="navbar navbar-expand-lg navbar-dark bg-dark">
               <div class="container-fluid">
                    <a class="navbar-brand" href="#"><strong>Borrowing System</strong></a>
                </div>
            </div>
        </nav>
    
        <div class="container">
            
            <div class="row" style="height:30%">
            </div>
            
            <div class="row">
            
                <div class="col">
                </div>
                
                <div class="col-7">
                    
                     <!-- LOGIN -->
                       <form class="form-control"  method="post"  action="php_codes.php" style="background-color : #1c2729">
                            <h2 style="color:#FFFFFF">Login</h2>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="txt_username" placeholder="User Name" required />
                                <label for="floatingInput">User Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="txt_password" placeholder="Password" required />
                                <label for="floatingInput">Password</label>

                                <div class="row" style="height:5%"></div>
                                <div class="row">

                                    <div class = "column"></div>
                                    <div class = "column"></div>

                                    <div class = "column">
                                        <input type="submit" class="btn btn-success" name="btn_login" value="Login" style="float:right"/>
                                    </div>
                                </div>
                            </div>     
                        </form>   
                </div>
    
                <div class="col">
                </div> 
            </div>
                
            <nav class="navbar fixed-bottom navbar-dark bg-dark">
              <a style="color:white">© all rights reserve 2022</a>
            </nav>          
        </div>
 
    </body>


</html>
