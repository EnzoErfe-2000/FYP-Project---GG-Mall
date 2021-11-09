<?php
			include_once '../include/dbh-inc.php';

            if(!isset($_SESSION["loggedin"]))
            {
                echo'
                    <script>
                        alert("Please login first");
                        location.href = "login.php";
                    </script>
                ';
            }

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

           
            if(isset($_POST["submit"]))
            {
                
                $filename = $_FILES['product_bigSwiperImg']['name'];
                $destination = './product_img/' . $filename;
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $file = $_FILES['product_bigSwiperImg']['tmp_name'];
                if (!in_array($extension, ['png', 'jpg', 'gif'])) {
                    echo "You file extension must be .png, .jpg or .gif";
                }else {
                    // move the uploaded (temporary) file to the specified destination
                    if (move_uploaded_file($file, $destination)) {
                        
                        $sql="INSERT INTO product (product_bigSwiperImg)  
                            VALUES ('$filename') ";

                        if (mysqli_query($conn, $sql)) {
                            echo "<script>
                            location.href = 'productlist.php';
                          </script>";
                        }
                    } else {
                        echo "Failed to upload file.";
                    }
                }
                
            };
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
                product_availability,
                product_bigSwiperImg)  
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
                '$product_availability','$filename') ";

			
            if($conn->query($sql) === TRUE)
            {
                echo "
                <script>
                  alert('Record added sucessfully.');
                  location.href = 'productlist.php';
                </script>";
            }
            else
            {
                echo "Error" ;
            }

        
?>