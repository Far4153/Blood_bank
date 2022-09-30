<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
</head>
<style>
      body{
    background-size: cover ;
    background-repeat: no-repeat;
  }
</style>

<body background="bg.jpeg">
	<div id="content">
		<form method="POST" action="upload.php" enctype="multipart/form-data">
		    <div class="form-group">
				<label for="date"><b> DATE</b></label>
				<input class="form-control" type="date" name="date" value="" required />
			</div>
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" accept="image/jpg,image/jpeg,image/png" required />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php
		try
		{
			$db = mysqli_connect("localhost", "root", "", "blood_bank");
		$query = " select * from img ";
		$result = mysqli_query($db, $query);
        echo "<b><table border='1'>
        <tr>
        <th>date</th>
        <th>image</th>
        </tr></b>";
       

		while ($data = mysqli_fetch_assoc($result)) 
        {
		
			
            echo "<tr>";
			echo "<td>" . $data['DATE']. "</td>";
			echo "<td>";
           // echo "<img src="./image/<?php echo $data['file']; 
		   ?>
		   <img src="./image/<?php echo $data['file'];?> " height="100px" width="100px">
		   
		   <?php
            echo "</td>";
        
        
        

        }
        echo "</table>";
            
		}
		catch(Exception $e)
		{
			echo "FAILED TO CONNECT DATABSE...";
		}
		?>
	</div>
</body>

</html>
