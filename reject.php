<html>
    <head>
        <title>REJECTED</title>
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
    <body style="background-color:#98AFC7">
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
            $a=$_REQUEST['aadhar'];
            $sql="SELECT * FROM admin where ADHAR='$a' ";
            $res=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($res);
            if($row=="null")
            {
                echo "ADHAR NUMBER DOES NOT EXIST ...";
            }
            else
            {
            //while($row=mysqli_fetch_assoc($res))
            //{
                $e=$row['EMAIL'];
                $to ="$e" ;
                    
                $mail= new PHPMailer();
                $mail->SMTPDebug = 2 ;
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->SMTPSecure="tls";
                $mail->Port=587;
                $mail->Username="your@gmail.com";
                $mail->Password="pwd";
                

                $mail->Subject='REJECTION EMAIL';
                $mail->setFrom('your@gmail.com',' BLOOD BANK');
                $mail->isHTML(true);
                $mail->Body="SORRY! ".$row['NAME']." Your request has been rejected.";
                $mail->addAddress($to);


                        if ($mail->send()) 
                        {
                            echo "REJECTION Email successfully sent. \n\n";
                        }
                        else
                        {
                            echo "failed to send REJECTION Email....";
                        }
                        $a=$row['ADHAR'];
                        $sql2="DELETE FROM admin WHERE admin.ADHAR=$a";
                        $r=mysqli_query($conn, $sql2);
            //}

            $sql1="UPDATE request SET status='REJECTED' where AADHAR_NO='$a' ";
            $res1=mysqli_query($conn, $sql1);
        }
        
        }
        catch(\Exception $e)
        {
            echo "<b>FAILED TO CONNECT DATABSE ....PLEASE TRY AGAIN</b>";
        }
            
        ?>
        <p><form action="index.html"><button class="btn"> EXIT</button></form></p>
    </body>
</html>