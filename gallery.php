<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GALLERY</title>
</head>
<style>
body{
  background-size: 130rem 400rem;
  background-repeat: no-repeat;
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
</style>
<body background="bg.jpeg">
  <center>
      
      <p><h2>You can view uploaded blood donation photos with date here through admin portal</h2></p><!-- comment out this line after uploading -->
        <?php
         try
         {
          $db = mysqli_connect("localhost", "root", "", "blood_bank");
          $query = " select * from img ";
          $result = mysqli_query($db, $query);
          echo "<table border='1'>
          <tr>
          <th>DATE OF DONATION</th>
          <th>IMAGE OF DONATION</th>
          </tr>";
  
  
          while ($data = mysqli_fetch_assoc($result)) 
          {
  
  
          echo "<tr>";
          echo "<td> <center><b>" . $data['DATE']. "</b></center></td>";
          echo "<td>";
          // echo "<img src="./image/<?php echo $data['file']; 
          ?>
          <img src="./image/<?php echo $data['file'];?> " height="500px" width="1050px">
  
          <?php
          echo "</td>";
  
          }
          echo "</table>";
         }
         catch(Exception $e)
         {
          echo "failed to connect databse ..please try again";
         }

        ?>
    </center>
</body>
</html>