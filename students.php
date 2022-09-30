<html>
    <head>

    </head>
    <style>
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
    </style>
    <body style="background-color:#C8F5F5">
      <?php
        try
        {
          $conn = mysqli_connect("localhost", "root", "", "blood_bank");
        $sql="SELECT * FROM students order by BLOOD_GROUP  ";
        $res=mysqli_query($conn, $sql);

    
        echo "<table border='1'>
        <tr>
        <th>REGISTER NUMBER</th>
        <th>NAME</th>
        <th>BLOOD GROUP</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>CITY</th>
        </tr>";

   
  
        while($row=mysqli_fetch_assoc($res))
       {
              echo "<tr>";
              echo "<td>" . $row['REGISTER_NO'] . "</td>";
              echo "<td>" . $row['FULL_NAME']. "</td>";
              echo "<td>" . $row['BLOOD_GROUP']. "</td>";
              echo "<td>" . $row['PHONE']. "</td>";
              echo "<td>" . $row['EMAIL'] . "</td>";
              echo "<td>" . $row['CITY']. "</td>";
          
        }
  
         echo "</table";
        }
        catch(Exception $e)
        {
          echo "FAILED TO CONNECT DATABASE";
        }
      ?>
      <p><form action="index.html"><button class="btn"> EXIT</button></form></p>
    </body>
</html>