<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPERATIONS</title>
</head>
<style>
      body{
    background-size: cover ;
    background-repeat: no-repeat;
  }
    .container
    {
        float:right;
        /* position: absolute; */
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%); 

        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #8dc8c9;
        padding: 50px;
        box-sizing: border-box;

        
    }
    .button
    {
        background-color: blue; /* Green */
        border: none;
        color: white;
        padding: 32px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 12px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .button1
    {
        background-color: blue; /* Green */
        border: none;
        color: white;
        
        padding: 32px 16px;
        text-align: center;
        text-decoration: none;
    
        font-size: 16px;
        border-radius: 12px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }

    .button2
    {
        background-color: #5184a0; ;
        border: none;
        color: white;
        padding: 32px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 12px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    }
    h1{
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);

        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        padding: 50px;
    }
</style>
<body background="bg.jpeg">
    <?php
       try
       {
        $a=$_REQUEST['admin'];
        $p=$_REQUEST['pwd'];
        $conn=mysqli_connect("localhost","root","","blood_bank");
        $sql="SELECT * FROM password";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);

        if(!($a== $row['NAME'] && $p==$row['PASSWORD']))
        {
            echo "<center><h1><b>ENTER VALID DETAILS</b></h1></center>";
        } 
        else
        {

                echo "<div class='container'>";
                echo "<p><form action='connect.php'><button class='button2'>AVAILABLE REQUEST</button></form></p>";
                echo "<p><form action='img.php'><button class='button2'>UPLOAD THE IMAGE</button></form></p>";
                echo "<p><form action='history.php'><button class='button2'>REQUEST HISTORY</button></form></p>";
                echo "<p><form action='update.html'><button class='button2'>UPDATE PASSWORD</button></form></p>";
                echo "</div>";
        }
       }
       catch(Exception $e)
       {
         echo "FAILED TO CONNECT DATABASE";
       }

    ?>
</body>
</html>