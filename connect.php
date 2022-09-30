<html>
    <head>
      <title>approve</title>
    <style>
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


    </head>
    <style>
      body{
        background-size: cover;
        background-repeat: no-repeat;
      }

      button{
        background-color: #5184a0; /* Green */
        border: none;
        color: white;
        
        padding: 10px 10px;
        text-align: center;
        text-decoration: none;
    
        font-size: 12px;
        /* border-radius: 12px; */
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

    </style>
    <body background="bg.jpeg">
      <?php
        $conn = mysqli_connect("localhost", "root", "", "blood_bank");
        $sql="SELECT * FROM admin ";
        $res=mysqli_query($conn, $sql);


        echo "<b><table border='1'>
        <tr>
        <th>AADHAR NUMBER</th>
        <th>NAME</th>
        <th>BLOOD GROUP</th>
        <th>REASON</th>
        <th>REPORT</th>
        
        <th>CITY</th>
        

        <th>APPROVAL</th>
        <th>REJECT</th>
        <th>PREVIEW</th>

        </tr></b>";
        echo "AVAILABLE REQUESTS";



        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td><b>" . $row['ADHAR'] . "</b></td>";
            echo "<td><b>" . $row['NAME']. "</b></td>";
            echo "<td><b><center>" . $row['BLOOD_GROUP']. "</center></b></td>";
            echo "<td><b>" . $row['REASON']. "</b></td>";
            echo "<td><b>". $row['REPORT']."</b></td>";
            
            echo "<td><b>" . $row['CITY']. "</b></td>";

        
            echo "<td><b>"."<form action='approve.html'><button> APPROVE </button></form>"."</b></td>";
            echo "<td><b>"."<form action='reject.html'><button> REJECT</button></form>"."</b></td>";
            echo "<td><b>"."<form action='PREVIEW.HTML'><button> PREVIEW</button></form>"."</b></td>";
        }

        echo "</table>";

      ?>
      <p><form action="index.html"><button class="btn"> EXIT</button></form></p>
    </body>
</html>