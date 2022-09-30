<!DOCTYPE html>
<html>
  
<head>
    <title>REQUEST</title>
    
</head>
  
<style>
    body{
		background-repeat: no-repeat;
		background-size: cover;
	}
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
<body background="bg.jpeg">
    <center>
        <?php
  
            require 'includes/PHPMailer.php';
            require 'includes/SMTP.php';
            require 'includes/Exception.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
            try
            {
                $conn = mysqli_connect("localhost", "root", "", "blood_bank");
                if($conn === false)
                {
                    die("ERROR: Could not connect. " 
                        . mysqli_connect_error());
                }
                // Taking all 5 values from the form data(input)
                if (isset($_POST['submit'])) 
                {
                    $registerno =  $_REQUEST['aadhar'];
                    $full_name = $_REQUEST['name'];
                    $bloodgroup =  $_REQUEST['bloodgroup'];
                    
                    $reason=$_REQUEST['reason'];
                    $filename = $_FILES["uploadfile"]["name"];
                    $tempname = $_FILES["uploadfile"]["tmp_name"];
                    $folder = "./REPORT/" . $filename;
                
                    $phone = $_REQUEST['phone'];
                    $mobile = $_REQUEST['mobile'];
                    $email = $_REQUEST['email'];
                    $city = $_REQUEST['city'];
                    $HLOC = $_REQUEST['hloc'];
                    $status="PENDING";
                    
                    
                }
                
    
                $f=1;
                $fn=strtoupper($full_name);
                $c=strtoupper($city);
                $rs=strtoupper($reason);
                $h=strtoupper($HLOC);
                // Performing insert query execution
                // here our table name is college
                //$sql = ("SELECT * FROM students (WHERE students.BLOOD_GROUP = "$bloodgroup")");
                $sql = "INSERT INTO request VALUES ('$registerno', '$fn','$bloodgroup','$rs','$filename','$phone','$mobile','$email','$c','$h','$status')";
                
                try
                {
                    if(mysqli_query($conn, $sql))
                    {
                        $sql1="SELECT * FROM students where students.BLOOD_GROUP in ('$bloodgroup' ,'O-') ORDER BY BLOOD_GROUP ASC";
                        $result = $conn->query($sql1);

                        if (move_uploaded_file($tempname, $folder)) {
                            echo "<h3> Image uploaded successfully!</h3>";
                        } else {
                            echo "<h3> Failed to upload image!</h3>";
                        }
                
                    // $sql2="SELECT SUBSTRING(FULL_NAME,1,3) FROM students ";
                        //$r = $conn->query($sql2);
                        
                        //echo "<div class='container'>";
                        echo "<b><table border='1'>
                        <tr>
                        <th>NAME</th>
                        <th>BLOOD GROUP</th>
                        <th>CITY</th>
                        </tr></b>";
                        echo"<br>";
                        echo "<b>AVAILABLE DONORS</b>";
                        echo"<br>";
    
                
    
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $N=$row['FULL_NAME'];
                            $S=substr($N,2,5);
    
                        
    
                            echo "<b><tr></b>";
                            //echo "<td>" . $row['REGISTER_NO'] . "</td>";
                            echo "<b><td>" . "***".$S."***". "</td></b>";
                            echo "<b><td><center>" .$row['BLOOD_GROUP']. "</center></td></b>";
                            //echo "<td>" . $row['PHONE']. "</td>";
                            //echo "<td>" . $row['EMAIL'] . "</td>";
                            echo "<b><td>" . $row['CITY']. "</td></b>";
    
                        
                        
    
                        }
                        echo "<b></table></b>";

                        $e="your@gmail.com";
                        $to ="$e";

                    
                        $mail= new PHPMailer();
                        $mail->SMTPDebug = 2 ;
                        $mail->isSMTP();
                        $mail->Host='smtp.gmail.com';
                        $mail->SMTPAuth=true;
                        $mail->SMTPSecure="tls";
                        $mail->Port=587;
                        $mail->Username="your@gmail.com";
                        $mail->Password="pwd";
                    

                        $mail->Subject='NEW REQUEST FOR BLOOD';
                        $mail->setFrom('your@gmail.com','BLOOD BANK');
                        $mail->isHTML(true);
                        $mail->Body="$full_name has requested for $bloodgroup blood. ";
                        $mail->addAddress($to);
    
                        if ($mail->send())
                        {
                            echo"<br>";
                            echo "REQUESTS SENT TO ADMIN SUCCESSFULY";
                            echo"<br>";
                            echo"<br>";
                            echo "<B>THANK YOU</B>";
                        }
                        else 
                        {
                            echo "Email sending failed...";
                        }
                        $sql2 = "INSERT INTO ADMIN VALUES ('$registerno', '$fn','$bloodgroup','$rs','$filename','$phone','$mobile','$email','$c','$HLOC')";
                        mysqli_query($conn, $sql2);
    
                    }
    
                    }
                    catch(\Exception $e)
                    {
                        echo "YOUR ADHAR NUMBER ALREADY EXIST";
                        echo "<br>";
                        echo "PLEASE ENTER VAID DETAILS";
                    }
                    
                    
                    // Close connection
                    mysqli_close($conn);
                }
                catch(\Exception $e)
                {
                    
                    echo "CONNECTION FAILED PLEASE TRY AGAIN ....";
                    
                }
            
            
            // Check connection
            

            echo "<p><form action='index.html'><button class='btn'> EXIT</button></form></p>";
            

        
        ?>
        <!-- <form action ="email.php"> <p> REQUEST SENT SUCCESSFULLY</p></form> -->
       
    </center>

    
</body>
  
</html>