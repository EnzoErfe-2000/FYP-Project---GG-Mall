<?php
include_once '../admin/include/adminheader.php';	

if(!isset($_SESSION["loggedin"]))
{
  echo'
    <script>
        alert("Please login first");
        location.href = "login.php";
    </script>
  ';
}

?>
<style>
.td {
	font-size:15px;
	left:20px;
}
</style>


<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="./">Home</a></li>
				  <li class="breadcrumb-item">Product</li>
				  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
				</ol>
          </div>
		  
		  <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
                </div>
                <div class="card-body">
				<form method="post" action="insertproduct.php" enctype="multipart/form-data" >
                    <div class="form-group row">
                        <label for="product_id" class="col-sm-3 col-form-label">Product ID</label>
                        <div class="col-sm-9">
                            <input class="form-control " type="text"name="product_id" placeholder="00000">
                        </div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_name" placeholder="Product Name">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_nameExtra" class="col-sm-3 col-form-label">Product Extra Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text"name="product_nameExtra" placeholder="Product Extra Name">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_fullName" class="col-sm-3 col-form-label">Product Full Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_fullName" placeholder="Product Full Name">
                      </div>
                    </div>

					<div class="form-group row">
						<label for="product_category0" class="col-sm-3 col-form-label">Product Category</label>
						<div class="col-sm-9">
							<select class="form-control" onchange="changeCategory(event)" name="product_categoryId">
							<?php
								$sql = "
								SELECT * FROM category
								";
								$stmt = mysqli_stmt_init($conn);
								if(!mysqli_stmt_prepare($stmt, $sql)){
									//header("location: cart.php?error=stmtfailed");
									//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
									//exit();
									mysqli_close($conn);
								}
								else
								{
									//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
								}
								mysqli_stmt_execute($stmt);
								$categories = mysqli_stmt_get_result($stmt);

								$categoriesArray = array();
								while ($categoriesRow = mysqli_fetch_assoc($categories))
								{
								  $categoriesArray[] = $categoriesRow;
								}
								
								for($i = 0 ; $i< count($categoriesArray) ; $i++)
								{
									echo"
										<option value='".$categoriesArray[$i]['category_id']."' 
										";
									if($i == 0)
									{
										echo"
											selected='selected'
										";
									}
									echo "
									>".$categoriesArray[$i]['category_name']."</option>
									";
								}?>
							</select>
							<input class="form-control" hidden readonly name="product_category0" id="product_category0" value="" placeholder="Product Category">
						</div>
                    </div>

					<div class="form-group row">
						<label for="product_category1" class="col-sm-3 col-form-label">Product Subcategory</label>
						<div class="col-sm-9">
							<select class="form-control" onchange="changeSubcategory(event)" name="product_subcategoryId">
							<?php
								$sql = "
								SELECT * FROM subcategory
								";
								$stmt = mysqli_stmt_init($conn);
								if(!mysqli_stmt_prepare($stmt, $sql)){
									//header("location: cart.php?error=stmtfailed");
									//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
									//exit();
									mysqli_close($conn);
								}
								else
								{
									//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
								}
								mysqli_stmt_execute($stmt);
								$subcategories = mysqli_stmt_get_result($stmt);

								$subcategoriesArray = array();
								while ($subcategoriesRow = mysqli_fetch_assoc($subcategories))
								{
								  $subcategoriesArray[] = $subcategoriesRow;
								}
								
								for($i = 0 ; $i< count($subcategoriesArray) ; $i++)
								{
									echo"
										<option value='".$subcategoriesArray[$i]['subcategory_id']."' 
										";
									if($i == 0)
									{
										echo"
											selected='selected'
										";
									}
									echo "
									>".$subcategoriesArray[$i]['subcategory_name']."</option>
									";
								}?>
							</select>
							<input class="form-control " hidden readonly name="product_category1" id="product_category1" value="" placeholder="Product Subcategory">
						</div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_brand" class="col-sm-3 col-form-label">Product Brand</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text"name="product_brand" placeholder=" ">
                      </div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_description" class="col-sm-3 col-form-label">Product Description</label>
                      <div class="col-sm-9">
					   <textarea class="form-control " type="text" name="product_description" placeholder="Description"rows="3"></textarea>
                      </div>
                    </div>
					
					
					<div class="form-group row">
                      <label for="product_regularPrice" class="col-sm-3 col-form-label">Product Regular Price [RM]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="number" min=1.00  step="0.01" pattern="^\d+(?:\.\d{1,2})?$"  name="product_regularPrice"placeholder="0.00">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_listedPrice" class="col-sm-3 col-form-label">Product Listed Price [RM]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="number" min=1.00 step="0.01" pattern="^\d+(?:\.\d{1,2})?$"  name="product_listedPrice"placeholder="0.00" >
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_discountRate" class="col-sm-3 col-form-label">ProductDiscount Rate</label>
                      <div class="col-sm-9">
					   <input class="form-control "  type="number"min=0???00  pattern="^\d+(?:\.\d{1,2})?$" step="0.01" name="product_discountRate"placeholder="0.00">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_availability" class="col-sm-3 col-form-label">Product Availability<br> [Key in Yes if available]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_availability" placeholder="Yes/No">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_stock" class="col-sm-3 col-form-label">Product Stock</label>
                      <div class="col-sm-9">
					   <input class="form-control "  type="number" min=0  name="product_stock" placeholder="0">
                      </div>
                    </div>
					

					<div class="form-group row">
                      <label for="product_bigSwiperImg" class="col-sm-3 col-form-label">Product Image </label>
                      <div class="col-sm-9">
					   <input class="form-control" type="file" id="file" name="product_bigSwiperImg[]"  multiple="multiple" accept=".jpg, .png, .gif" onchange="preview_image();" />
             <?php
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
             
             ?><div id="image_preview"></div>
                      </div>
                    </div>

                     <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                      </div>
                    </div>
				</form>
				  
                </div>
              </div>
         
	</div>
  <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script>
$(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
  alert("Uploaded SuccessFully");
 }); 
});
function preview_image() 
{
 var total_file=document.getElementById("file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+" 'width='100' height='100'>    ");
 }
}
</script>
	<?php
		include_once 'include/adminfooter.php';	
	?>
</div>
<script>
function changeCategory(e) {
    document.getElementById("product_category0").value = e.target.options[e.target.selectedIndex].text;
}
function changeSubcategory(e) {
    document.getElementById("product_category1").value = e.target.options[e.target.selectedIndex].text;
}
</script>