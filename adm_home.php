<?php

require_once('nav.php')
    

    
?>


<html>
    <head>
        <title>Borrowing </title>
    </head>
    
    
 
    <body>
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
                          <div class="col" style="height:750px">
                              
                            <div id="available_items_chart"></div>
                            
                            <br>
                              
                            <div id="total_items_chart"></div>
                         
                              
                            </div>
                          </div>
                          
  
                      </div>
                  <div class="col">
                      
                  
                  </div>
                      
                  </div>
                  
                  
                  
              </div>
              
   
     
    </body>
    
    
</html>
