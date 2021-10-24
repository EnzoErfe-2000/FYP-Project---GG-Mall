<?php
include_once '../admin/include/adminheader.php';
?>
<style>
.td {
	font-size:15px;
	left:20px;
}
</style>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="./">Home</a></li>
				  <li class="breadcrumb-item">Product</li>
				  <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
				</ol>
          </div>
          <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                </div>
                <div class="card-body">
<?php
include_once '../include/dbh-inc.php';
$id = $_GET['product']; // get id through query string
$sql = "SELECT * FROM product where product_id = $id";
$result = $conn->query($sql);

$data = mysqli_fetch_array($result); // fetch data
?> 
<?php 
if(isset($_POST['update_product'])) // when click on Update button
{
    
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_product_nameExtra =$_POST['product_nameExtra'];
    $product_product_fullName = $_POST['product_fullName'];

    $product_category0 =$_POST['product_category0'];
    $product_category1 = $_POST['product_category1'];

    $product_brand =$_POST['product_brand'];
    $product_description =  $_POST['product_description'];

    $product_regularPrice =$_POST['product_regularPrice'];
    $product_listedPrice =  $_POST['product_listedPrice'];
    $product_discountRate = $_POST['product_discountRate'];

    $product_availability = $_POST['product_availability'];
    $product_stock = $_POST['product_stock'];
    

    $edit = mysqli_query($conn,"UPDATE product
    set product_id='$product_id',
        product_name='$product_name',
        product_nameExtra='$product_product_nameExtra',
        product_fullName='$product_product_fullName',
        product_category0='$product_category0',
        product_category1='$product_category1',
        product_brand='$product_brand',
        product_description='$product_description',
        product_regularPrice= '$product_regularPrice',
        product_listedPrice='$product_listedPrice',
        product_discountRate='$product_discountRate',
        product_stock='$product_stock',
        product_availability='$product_availability',
         where id='$id'");
}
        if($edit)
        {
            mysqli_close($db); // Close connection
            header("location:productlist.php"); // redirects to all records page
            exit;
        }
        else
        {
            echo "Error to update product details..";
        }    	
?> 
<form method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="product_id" class="col-sm-3 col-form-label">Product ID</label>
                        <div class="col-sm-9">
                            <input class="form-control " type="text"name="product_id" value="<?php echo $data['product_id'] ?>" placeholder="00000">
                        </div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_name" value="<?php echo $data['product_name'] ?>"placeholder="Product Name">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_nameExtra" class="col-sm-3 col-form-label">Product Extra Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text"name="product_nameExtra" value="<?php echo $data['product_nameExtra'] ?>"placeholder="Product Extra Name">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_fullName" class="col-sm-3 col-form-label">Product Full Name</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_fullName" value="<?php echo $data['product_fullName'] ?>"placeholder="Product Full Name">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_category0" class="col-sm-3 col-form-label">Product Category</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_category0"value="<?php echo $data['product_category0'] ?>" placeholder="Product Category">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_category1" class="col-sm-3 col-form-label">Product Subcategory</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_category1" value="<?php echo $data['product_category1'] ?>"placeholder="Product Subcategory">
                      </div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_brand" class="col-sm-3 col-form-label">Product Brand</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text"name="product_brand" value="<?php echo $data['product_brand'] ?>"placeholder=" ">
                      </div>
                    </div>
					
					<div class="form-group row">
                      <label for="product_description" class="col-sm-3 col-form-label">Product Description</label>
                      <div class="col-sm-9">
					   <textarea class="form-control " type="text" name="product_description" placeholder="Description"rows="3"><?php echo $data['product_description'] ?></textarea>
                      </div>
                    </div>
					
					
					<div class="form-group row">
                      <label for="product_regularPrice" class="col-sm-3 col-form-label">Product Regular Price [RM]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="number" step="0.01" name="product_regularPrice"value="<?php echo $data['product_regularPrice'] ?>"placeholder="0.00">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_listedPrice" class="col-sm-3 col-form-label">Product Listed Price [RM]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="number" step="0.01" name="product_listedPrice"value="<?php echo $data['product_listedPrice'] ?>"placeholder="0.00">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_discountRate" class="col-sm-3 col-form-label">ProductDiscount Rate</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="number" step="0.01" name="product_discountRate"value="<?php echo $data['product_discountRate'] ?>"placeholder="0.00">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_availability" class="col-sm-3 col-form-label">Product Availability<br> [Key in Yes if available]</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_availability" value="<?php echo $data['product_availability'] ?>"placeholder="Yes/No">
                      </div>
                    </div>

					<div class="form-group row">
                      <label for="product_stock" class="col-sm-3 col-form-label">Product Stock</label>
                      <div class="col-sm-9">
					   <input class="form-control " type="text" name="product_stock" value="<?php echo $data['product_stock'] ?>"placeholder="0">
                      </div>
                    </div>

                     <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" id="update_product" name="update_product" class="btn btn-primary">Update</button>
                      </div>
                    </div>
    </form>

<?php
include_once 'include/adminfooter.php';	
?>
  