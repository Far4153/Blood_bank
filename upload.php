<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...

if (isset($_POST['upload'])) {
    
	$d= $_REQUEST['date'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "blood_bank");

	// Get all the submitted data from the form
	try
    {
        $sql = "INSERT INTO img (date,file) VALUES ('$d','$filename')";

        // Execute query
        mysqli_query($db, $sql);

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3> Image uploaded successfully!</h3>";
        } else {
            echo "<h3> Failed to upload image!</h3>";
        }

    }
    catch(Exception $e)
    {
        echo "DUPLICATE ENTRIES NOT ALLOWED";
    }
    echo "<p><form action='index.html'><button class='btn'> EXIT</button></form></p>";
}
?>