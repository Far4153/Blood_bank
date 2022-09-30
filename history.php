<html>
    <head>
<title>HISTORY</title>
    </head>
    <style>
      button{
        
        background-color: #5184a0; /* Green */
        border: none;
        color: white;
        
        padding: 15px 16px;
        text-align: center;
        text-decoration: none;
    
        font-size: 12px;
        border-radius: 12px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
      }
    .btn{
        background-color: #5184a0; /* Green */
        border: none;
        color: white;
        
        padding: 15px 16px;
        text-align: center;
        text-decoration: none;
    
        font-size: 16px;
        border-radius: 12px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
  
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }

      tr:nth-child(even) {
        background-color: rgba(150, 212, 212, 0.4);
      }

      th:nth-child(even),td:nth-child(even) {
        background-color: rgba(150, 212, 212, 0.4);
      }
      body{
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>


    </head>
    
      
    <body background="bg.jpeg">
        <?php
          try
          {
            $conn = mysqli_connect("localhost", "root", "", "blood_bank");
          $sql="SELECT * FROM request order by BLOOD_GROUP ";
          $res=mysqli_query($conn, $sql);

      
          echo "<b><table border='1'>
          <tr>
          <th>AADHAR NUMBER</th>
          <th>NAME</th>
          <th>BLOOD GROUP</th>
          <th>REASON</th>
          <th>REPORT</th>
          
          <th>CITY</th>
          <th>STATUS</th>
          <th>PREVIEW</th>
          
          </tr></b>";

    
    
          while($row=mysqli_fetch_assoc($res))
        {
                echo "<tr>";
                echo "<td><b>" . $row['AADHAR_NO'] . "</b></td>";
                echo "<td><b>" . $row['FULL_NAME']. "</b></td>";
                echo "<td><center><b>" . $row['BLOOD_GROUP']. "</b></center></td>";
                echo "<td><b>" . $row['REASON']. "</b></td>";
                echo "<td><b>";
                ?>
                <img src="./REPORT/<?php echo $row['REPORT'];?> " height="100px" width="100px">
                <?php
                echo "</td>";
                // echo "<td>" . $row['PHONE']. "</td>";
                // echo "<td>" . $row['EMAIL'] . "</td>";
                echo "<td><b>" . $row['CITY']. "</b></td>";
                echo "<td><b>" . $row['status']. "</b></td>";
                echo "<td><b>"."<form action='PREVIEW.HTML'><button> PREVIEW</button></form>"."</b></td>";
                
            
          }
          echo "</table>";
          }
          catch(Exception $e)
          {
            echo "FAILED TO CONNECT DATABASE...";
          }
    
          
        ?>
        <!--<p><form action="index.html"><button class="btn"> EXIT</button></form></p>-->

        <p><form action="index.html"><button class="btn"> EXIT</button></form></p>
    </body>
</html>