<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
    background-size: cover ;
    background-repeat: no-repeat;
    }
    h1{
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);

        display: flex;
        flex-direction: column;
        align-items: center;
        /* background-color: #fff; */
        padding: 50px;
    }
    
</style>
<body background="bg.jpeg">
<?php

try
{
    $name=$_REQUEST['name'];
    $pwd=$_REQUEST['pwd'];

    $conn=mysqli_connect("localhost","root","","blood_bank");
    $sql="DELETE FROM password where 1";
    $res=mysqli_query($conn,$sql);
    $sql1="INSERT into password values ('$name','$pwd')";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        echo "<center><h1><b>YOUR PASSWORD HAS BEEN SUCCESSFULLY UPDATED</b></h1></center";
    }
    else
    {
        echo "FAILED TO UPDATE PASSWORD";
    }


}
catch (Exception $e)
{
    echo "FAILED TO CONNECT TO DATABASE";
}

?>
</body>
</html>