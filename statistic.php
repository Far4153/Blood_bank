<?php
$con = mysqli_connect('localhost','root','','blood_bank');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>statistical data</title>
</head>
<!DOCTYPE html>
<style>
  body{
    background-size: 180rem 400rem ;
    background-repeat: no-repeat;
  }
</style>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            function drawChart() {
                // call ajax function to get sports data
                var jsonData = $.ajax({
                    url: "getData.php",
                    dataType: "json",
                    async: false
                }).responseText;
                //The DataTable object is used to hold the data passed into a visualization.
                var data = new google.visualization.DataTable(jsonData);

                // To render the pie chart.
                var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
                chart.draw(data, {width: 450, height: 400});
            }
            // load the visualization api
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);
        </script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script type="text/javascript">
       google.load("visualization", "1", {packages:["corechart"]});
       google.setOnLoadCallback(drawChart);
       function drawChart() {
       var data = google.visualization.arrayToDataTable([
      
       ['class Name','Students'],
       <?php 
                  $query = "SELECT BLOOD_GROUP,COUNT(*) from students group by BLOOD_GROUP";
      
                   $exec = mysqli_query($con,$query);
                   while($row = mysqli_fetch_array($exec)){
      
                   echo "['".$row['BLOOD_GROUP']."',".$row['COUNT(*)']."],";
                   }
                   ?> 
       
       ]);
      
       var options = {
       title: '',
       backgroundColor:"transparent",
        //pieHole: 0.5,
      pieSliceTextStyle: {
        color: 'black',
      },
      legend: 'none'
       };
       var chart = new google.visualization.PieChart(document.getElementById("piechart"));
       chart.draw(data,options);
       }
          
  </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            function drawChart() {
                // call ajax function to get sports data
                var jsonData = $.ajax({
                    url: "getData.php",
                    dataType: "json",
                    async: false
                }).responseText;
                //The DataTable object is used to hold the data passed into a visualization.
                var data = new google.visualization.DataTable(jsonData);

                // To render the pie chart.
                var chart = new google.visualization.PieChart(document.getElementById('chart_container'));
                chart.draw(data, {width: 450, height: 400});
            }
            // load the visualization api
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);
        </script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script type="text/javascript">
       google.load("visualization", "1", {packages:["corechart"]});
       google.setOnLoadCallback(drawChart);
       function drawChart() {
       var data = google.visualization.arrayToDataTable([
      
       ['class Name','Students'],
       <?php 
                  $query = "SELECT CITY,COUNT(*) from students group by CITY";
      
                   $exec = mysqli_query($con,$query);
                   while($row = mysqli_fetch_array($exec)){
      
                   echo "['".$row['CITY']."',".$row['COUNT(*)']."],";
                   }
                   ?> 
       
       ]);
      
       var options = {
       title: '',
       backgroundColor:"transparent",
        pieHole: 0.5,
        pieSliceTextStyle: {
          color: 'black',
        },
        legend: 'none'
       };
       var chart = new google.visualization.ColumnChart(document.getElementById("columnchart12"));
       chart.draw(data,options);
       }
          
          </script>
      
<body background="bg.jpeg">
    <h1 ><b><center><i>STATISTICAL DATA</i> </center> </b>   </h1>
  
      <!--  <div class="column">
          <center><div id="chart_container" height="500px" width="1500px" ></div></center>
          <img src="pie.jpeg" alt="PIECHART" style="width:100%"><h3>Pie chart of Blood Groups</h3>
        </div>
        <div class="column">
          <img src="bar.jpeg" alt="BAR GRAPH" height="500px" width="1500px" ><h3>Bar Graph of Students in clg</h3>
        </div>
        -->
    
  
  
     <div class="row">
      <div class="column">
        <center>
          <img src="cc.png" alt="COMPATIBILITY CHART" height="500px" width="1000px">
          </center>
        </div>
      </div>

     <br>
    <div class="rows">
        <div class="column">
            <div class="container-fluid">
            <center><div id="piechart" style="width: 90%; height: 700px;"></div>
              <div><h2>AVAILABLE  BLOOD  DONORS  ACCORDING  TO  BLOODGROUP</h2></div>
                </center>
             </div>
        </div>
    </div>
    <br>
    <div class="rows">
        <div class="column">
            <div class="container-fluid">
                <div id="columnchart12" style="width: 100%; height: 500px;"></div>
                <center><div><h2>AVAILABLE  DONORS  ACCORDING  TO  CITY</h2></div></center>
             </div>
        </div>
    </div>
       
</body>
</html>