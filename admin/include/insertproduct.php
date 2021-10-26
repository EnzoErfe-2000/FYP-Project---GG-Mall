<?php
			include_once '../include/dbh-inc.php';
			$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
			$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
			$product_category0 = mysqli_real_escape_string($conn, $_POST['product_category0']);
			$product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
			$product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
			$product_stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
			$product_availability = mysqli_real_escape_string($conn, $_POST['product_availability']);
			
			$sql="INSERT INTO product (product_id,product_name,product_category,product_brand,product_description,product_stock,product_availability) VALUES ('$product_id','$product_name','$product_category0','$product_brand','$product_description','$product_stock','$product_availability')";
			
			
			if($conn->query($sql) === TRUE){
			 echo "Record Added Sucessfully";
			}
			else
			{
			 echo "Error" . $sql . "<br/>" . $conn->error;
			}
?>