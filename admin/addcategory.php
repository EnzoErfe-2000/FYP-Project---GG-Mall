<?php
include_once '../admin/include/adminheader.php';	
?>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
          </div>
		  <div class="content">
		
		  </div>
</div>

<?php
include_once 'include/adminfooter.php';	
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"gg_mall");
?>

	
<?php
if(isset($_POST["submit1"]))
{
	$fnm=$_FILES["product_img"]["name"];
	$dst="../product_img/".$fnm;
	move_uploaded_file($_FILES["product_img"]["tmp_name"],$dst);
	
	mysqli_query($link,"INSERT INTO product values(product_id,product_name,product_category0,product_brand,product_description,product_listedPrice,product_stock,product_availability,'$dst')");
}
?>
	</div>