<?php
  
  try
  {
    $conn=mysqli_connect("localhost","root","","blood_bank");
    $a=$_REQUEST['aadhar'];

    $sql="SELECT REPORT from request where AADHAR_NO='$a'";
    $res=mysqli_query($conn,$sql);

    $r=mysqli_fetch_assoc($res);
    if($r==null)
    {
      echo "AADHAR NUMBER DOES NOT EXIST";
    }

    ?>
    
    
    <img src="./REPORT/<?php echo $r['REPORT'];?> " height="1000px" width="1000px" alt="report image">
    
    <?php

  }
  catch(Exception $e)
  {
       echo "FAILED TO CONNECT ....!!";
  }

?>
