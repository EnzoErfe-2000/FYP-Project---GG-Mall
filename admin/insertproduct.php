<?php
			
			include_once '../include/session-db-func.php';

            if(!isset($_SESSION["loggedin"]))
            {
                echo'
                    <script>
                        alert("In insert, Please login first");
                        location.href = "login.php";
                    </script>
                ';
            }

			$product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
			$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
            $product_product_nameExtra = mysqli_real_escape_string($conn, $_POST['product_nameExtra']);
            $product_product_fullName = mysqli_real_escape_string($conn, $_POST['product_fullName']);

			$product_categoryId = mysqli_real_escape_string($conn, $_POST['product_categoryId']);
			$product_category0 = mysqli_real_escape_string($conn, $_POST['product_category0']);
            $product_subcategoryId = mysqli_real_escape_string($conn, $_POST['product_subcategoryId']);
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
				$allowTypes = array('jpg','png','jpeg','gif');
				$imageNamesArr = array();
				 $total = count($_FILES['product_bigSwiperImg']['name']);
				 $fileNames = array_filter($_FILES['product_bigSwiperImg']['name']); 
				 if(!empty($fileNames))
				 {
					foreach($_FILES['product_bigSwiperImg']['name'] as $key=>$val) 
					{
						$filename = $_FILES['product_bigSwiperImg']['name'][$key];
						$destination = './product_img/' . $filename;
						$userDestination = '../product_img/' . $filename;
						
						$fileType = pathinfo($destination, PATHINFO_EXTENSION);
						$fileType1 = pathinfo($userDestination, PATHINFO_EXTENSION);
						if(in_array($fileType, $allowTypes) && in_array($fileType1, $allowTypes)){
							//Add to string
							array_push($imageNamesArr, $filename);
							//Move to folder
							$file = $_FILES['product_bigSwiperImg']['tmp_name'][$key];
							copy($file, $userDestination);
							move_uploaded_file($file, $destination);
                            $mainImage = $imageNamesArr[0];
                            $imageNamesString = implode(" ", $imageNamesArr);
                           
                            
						}
						else{
							echo "You file extension must be .png, .jpg or .gif";
						}
					}
					
				 }
				 
				 
            };  
	
            $sql="INSERT INTO product (
                            
                product_id,
                product_name,
                product_nameExtra,
                product_fullName,
                product_categoryId,
                product_category0,
                product_subcategoryId,
                product_category1,
                product_brand,
                product_description,
                product_regularPrice,
                product_listedPrice,
                product_discountRate,
                product_stock,
                product_availability,
                product_img,  
                product_bigSwiperImg)  
                VALUES (
               
                '$product_id',
                '$product_name',
                '$product_product_nameExtra',
                '$product_product_fullName',
                '$product_categoryId',
                '$product_category0',
                '$product_subcategoryId',
                '$product_category1',
                '$product_brand',
                '$product_description',
                '$product_regularPrice',
                '$product_listedPrice',
                '$product_discountRate',
                '$product_stock',
                '$product_availability',
				'$mainImage',
				'$imageNamesString') ";

			
            if($conn->query($sql) === TRUE)
            {
                echo "
                <script>
                  alert('Record added sucessfully $imageNamesString uploaded');
                  location.href = 'productlist.php';
                </script>";
            }
            else
            {
                echo "
                <script>
                  alert('Record error.');
                  location.href = 'productlist.php';
                </script>";
            }
	

        
?>
