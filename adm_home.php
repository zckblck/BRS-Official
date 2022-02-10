<?php

require_once('nav.php')
    

    
?>


<html>
    <head>
        <title>Borrowing </title>
    </head>
    
    
 
    <body>
        
        <style>
            .card{
                width: 300PX;
            }
            .card-header{
                background-color: #3c4737;
                color: #dbe2ef;
                width: 300PX;
            } 
        </style>
        
        
        
        
        <!--
        <script type="text/javascript">
            
            // Load google charts
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart_available_items);

            // Draw the chart and set the chart values
            function drawChart_available_items() {
              var data = google.visualization.arrayToDataTable([
              ['Available Items', 'Quantity'],
              ['Work', 5],
              ['Eat', 2],
              ['TV', 4],
              ['Gym', 2],
              ['Sleep', 8]
            ]);

              // Optional; add a title and set the width and height of the chart
              var options = {'title':'Available Items', 'width':550, 'height':400};

              // Display the chart inside the <div> element with id="piechart"
              var chart = new google.charts.Bar(document.getElementById('available_items_chart'));
              chart.draw(data, options);
            }
            
            
            
  
        </script>
       -->

          <div class="container">
              
              
              <!-- ROW 1 -->
              <div class="row" style="height:50px">
              </div>

              
              <!-- ROW 2 -->
                <div class="row">

                    <div class="col">
                        <div class="row">

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 style="text-align:center">AVAILABLE ITEMS</h5>
                                </div>
                                <div class="card-block">
                                    <strong style="text-align:left ; padding-left:10px">Total Available Assets :</strong> 
                                </div>
                                <div class="card-block">
                                    <h3 style="text-align:right ; padding-right:20px"><?php echo $count_avail_items ?></h3>                    
                                </div>
                                <div class="card-block">
                                    
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

                                            </tr>
                                        </thead>

                                        <tbody style="text-align:center">

                                            <?php echo $tr_borrow ?>

                                        </tbody>

                                    </table>
                            </div>                   
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 style="text-align:center">BORROWED ITEMS</h5>
                                </div>
                                <div class="card-block">
                                    <strong style="text-align:left ; padding-left:10px">Total Borrowed Assets :</strong> 
                                </div>
                                <div class="card-block">
                                    <h3 style="text-align:right ; padding-right:20px"><?php echo $count_borrowed_items ?></h3>                    
                                </div>
                                <div class="card-block">
                                    <div class="col" style="overflow:scroll ; height:650px">
                                <!-- Table Grid-->
                                    <table class="table table-hover table-striped border-dark" border=1>

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

                                        <tbody style="text-align:center">

                                            <?php echo $tr_return ?>

                                        </tbody>

                                    </table>
                </div>                   
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 style="text-align:center">ON-GOING REPAIR</h5>
                                </div>
                                <div class="card-block">
                                    <strong style="text-align:left ; padding-left:10px">Total On-Going Repair Assets :</strong> 
                                </div>
                                <div class="card-block">
                                    <h3 style="text-align:right ; padding-right:20px"><?php echo $count_ongoingRepair_items ?></h3>                  
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h5 style="text-align:center">FOR DISPOSAL</h5>
                                </div>
                                <div class="card-block">
                                    <strong style="text-align:left ; padding-left:10px">Total For Disposal Assets :</strong> 
                                </div>
                                <div class="card-block">
                                    <h3 style="text-align:right ; padding-right:20px"><?php echo $count_forDisposal_items ?></h3>                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
         

    
              

            
       
                  
                  
                  
    </div>
              
   
     
    </body>
    
    
</html>
