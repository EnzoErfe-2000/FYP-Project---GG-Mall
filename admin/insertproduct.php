<?php
			include_once '../include/dbh-inc.php';
			$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
			$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
            $product_product_nameExtra = mysqli_real_escape_string($conn, $_POST['product_nameExtra']);
            $product_product_fullName = mysqli_real_escape_string($conn, $_POST['product_fullName']);

			$product_category0 = mysqli_real_escape_string($conn, $_POST['product_category0']);
            $product_category1 = mysqli_real_escape_string($conn, $_POST['product_category1']);

			$product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
			$product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

            $product_regularPrice = mysqli_real_escape_string($conn, $_POST['product_regularPrice']);
            $product_listedPrice = mysqli_real_escape_string($conn, $_POST['product_listedPrice']);
            $product_discountRate = mysqli_real_escape_string($conn, $_POST['product_discountRate']);

            $product_availability = mysqli_real_escape_string($conn, $_POST['product_availability']);
			$product_stock = mysqli_real_escape_string($conn, $_POST['product_stock']);

            $product_bigSwiperImg = mysqli_real_escape_string($conn, $_POST['product_bigSwiperImg']);
		
            if(isset($_POST["submit1"]))
            {
                
                    
                if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["product_bigSwiperImg"]["name"];    // get the image name in $fnm variable
    $dst = "./product_img/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "product_img/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["product_bigSwiperImg"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($db,"insert into product(product_bigSwiperImg) values('$dst_db')");  // executing insert query
		
    if($check)
    {
    	echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}



			$sql="INSERT INTO product (
                product_id,
                product_name,
                product_nameExtra,
                product_fullName,
                product_category0,
                product_category1,
                product_brand,
                product_description,
                product_regularPrice,
                product_listedPrice,
                product_discountRate,
                product_stock,
                product_availability) 
                
                VALUES (
                '$product_id',
                '$product_name',
                '$product_product_nameExtra',
                '$product_product_fullName',
                '$product_category0',
                '$product_category1',
                '$product_brand',
                '$product_description',
                '$product_regularPrice',
                '$product_listedPrice',
                '$product_discountRate',
                '$product_stock',
                '$product_availability') ";
                 };
                 mysqli_query($db,$sql);
			
            if($conn->query($sql) === TRUE){
                echo "Record Added Sucessfully";
                }
                else
                {
                echo "Error" . $sql . "<br/>" . $conn->error;
                }
                $statusMsg = '';
                

        
?>