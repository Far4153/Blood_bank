<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
<style>
    .container
    {
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);

        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #8dc8c9;
        padding: 50px;

        
    }

    .btn
    {
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
  
<body background="bg.jpg">
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "blood_bank");
          
        // Check connection
        if($conn === false)
        {
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $rn =  $_REQUEST['regno'];
        $full_name = $_REQUEST['name'];
        $bloodgroup =  $_REQUEST['bloodgroup'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $city = $_REQUEST['city'];

        $fn=strtoupper($full_name);
        $registerno=strtoupper($rn);
        $c=strtoupper($city);

        
        
        
        
        
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO students VALUES ('$registerno','$fn','$bloodgroup','$phone','$email','$c')";
        try
        {
            if(mysqli_query($conn, $sql))
            {
                echo "<div class='container'>";
                echo "<h3>REGISTRATION SUCCESSFULL<h3>"; 

                echo ("\n\n\n");

                echo "<table border='1'>";

                echo "<tr>";
                echo "<td>" . "REGISTER NUMBER " . "</td>";
                echo "<td>" .$registerno. "</td>";
                echo "</tr>";
            
                echo "<tr>";
                echo "<td>" ." NAME "  . "</td>";
                echo "<td>" .$fn. "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . "BLOOD GROUP ". "</td>";
                echo "<td>" .$bloodgroup. "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" ." PHONE NUMBER " . "</td>";
                echo "<td>" .$phone. "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . "EMAIL ID "  . "</td>";
                echo "<td>" .$email. "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . "CITY"  . "</td>";
                echo "<td>" .$c. "</td>";
                echo "</tr>";

            
                echo "</div>";
            
                echo "</table>"; 
            } 

            
        
            $to_email ="$email" ;
            $subject = "REGISTRATION SUCCESSFULL";
            $body = "Thank you for registering in bloodbank";
            $headers = "From: xxxx@gmail.com";

            if (mail($to_email, $subject, $body, $headers))
            {
                echo "<br>";
               echo "CONFIRMATION MAIL SENT SUCCESSFULY ";
               
               echo "<br>";
               echo "<br>";
               echo " ***THANK YOU***";
            }
            else 
            {
                echo "Email sending failed...";
            }
            //echo "</div>";     
               // . " Please browse your localhost php my admin" 
                //. " to view the updated data</h3>"; 
  
            //echo nl2br("\n REGISTER NUMBER :$registerno\n NAME :$full_name\n "
              //  . " BLOOD GROUP : $bloodgroup\n PHONE NO : $phone\n EMAIL : $email \n CITY : $city");
        } 
        catch(Exception $e)
        {
            echo " <h2>
            <b>YOUR REGISTER NUMBER ALREADY EXISTS</b></h4>";
            echo "<br>";
            echo "PLEASE ENTER VAID DETAILS";
        }
        
          
        // Close connection
        mysqli_close($conn);

        ?>
        <p><form action="index.html"><button class="btn"> EXIT</button></form></p>
    </center>
</body>
  
</html>