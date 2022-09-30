<html>
    <head>
        <title>SEND SMS</title>
    </head>
    <style>
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
    <body >
        
         <?php
            
            require 'includes/PHPMailer.php';
            require 'includes/SMTP.php';
            require 'includes/Exception.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
               try
               {
                $c=0;
                $d=0;
                $conn = mysqli_connect("localhost", "root", "", "blood_bank");
               $a=$_REQUEST['aadhar'];
             
               $sql="SELECT * FROM admin where ADHAR='$a'";
               $res=mysqli_query($conn, $sql);
               $row=mysqli_fetch_assoc($res);
               if($row==null)
               {
                 echo "ADHAR NUMBER DOES NOT EXIST ";
               }
               else
               {
               
        
               //  while($row=mysqli_fetch_assoc($res))
               // {
                
                
                   $bloodgroup=$row['BLOOD_GROUP'];

            
                   $sql1="SELECT * FROM students where students.BLOOD_GROUP in ('$bloodgroup' , 'O-' , 'o-') ORDER BY BLOOD_GROUP ASC";
                   $result = mysqli_query($conn, $sql1);
                   while($row1=mysqli_fetch_assoc($result))
                    {

                        $e=$row1['EMAIL'];
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
                    

                        $mail->Subject='REQUEST FOR BLOOD';
                        $mail->setFrom('your@gmail.com','BLOOD BANK');
                        $mail->isHTML(true);
                        $mail->Body="Hello! ".$row['NAME']." is in need for " .$row['BLOOD_GROUP']. " blood from " .$row['CITY']. " due to " .$row['REASON']. "."."<br><br><br>". "NOTE: 1.Donate only if you are a healthy person "."<br>"." 2.if you have donated blood in last 3 months, please ignore this."."<br><br>"." If you are willing to donate blod please contact +" .$row['PHONE'].", +".$row['MOBILE']." AFTER DONATING BLOOD PLEASE SEND US AN ATTACHMENT OF BLOOD DONATION PICTURE "."<br><br><br><br><br>"." GIVE THE GIFT OF LIFE,DONATE BLOOD :) ";
                        $mail->addAddress($to);

                        if ($mail->send()) 
                        {   
                            // echo"<br>";
                            // echo "Email successfully sent to $to_email... ";
                            // echo "<br>";
                            $c=$c+1;
                        }
                        else
                        {
                            // echo "Email has not sent to $to_email....";
                            // echo "\r\n";
                            $d=$d+1;
                        }
                        // echo"<br>";
                            // echo "Email successfully sent to $to_email... ";
                            // echo "<br>";
                
                    }
                            echo"<br>";
                            echo "<b>Email successfully sent to $c students...</b> ";
                            echo "<br>";
                            echo "<b>Email has not sent to $d students....</b>";
                            echo "\r\n";

                            
                    $a=$row['ADHAR'];
                    $sql2="DELETE FROM admin WHERE admin.ADHAR=$a";
                    $r=mysqli_query($conn, $sql2);

               // }
               $sql1="UPDATE request SET status='APPROVED' where AADHAR_NO='$a' ";
               $res1=mysqli_query($conn, $sql1);
                }
               }
               catch(\Exception $e)
               {
                echo "CONNECTION FAILED..PLEASE TRYY AGAIN";
               }
            ?>
            <p><form action="index.html"><button class="btn">EXIT</button></form></p>
    </body>
</html>