<?php 
// MySQL database connection code
$connection = mysqli_connect("localhost","root","","blood_bank") or die("Error " . mysqli_error($connection));
//Fetch sports data
$sql = "SELECT BLOOD_GROUP ,COUNT(*) FROM request group by BLOOD_GROUP";
$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
//create an array
$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{  
    $orgname = $row['BLOOD_GROUP'];
    $count = $row['COUNT(*)'];
    $array['cols'][] = array('type' => 'string'); 
    $array['rows'][] = array('c' => array( array('v'=> $orgname), array('v'=>(int)$count)) );
}
$data = json_encode($array);
echo $data;
?>