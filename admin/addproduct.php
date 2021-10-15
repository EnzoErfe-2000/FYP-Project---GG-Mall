<?php
include_once '../include/adminsidebar.php';
include_once '../include/session-db-func.php';
include_once '../include/dbh-inc.php';
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"gg_mall");
?>

	<div class="content">
		<div class="box round first">
			<h2>Add Product</h2>
			<div class="block">
				<form name="form1" action="" method="post" enctype="multipart/form-data">
				<table border=1>
				<tr>
					<td>Product ID</td>
					<td><input type="text" name="product_id"></td>
				</tr>
				<tr>
					<td>Product Name</td>
					<td><input type="text" name="product_name"></td>
				</tr>
				<tr>
					<td>Product Category</td>
					<td><input type="text" name="product_category0"></td>
					<select name=
				</tr>
				<tr>
					<td>Product Brand</td>
					<td><input type="text" name="product_brand"></td>
				</tr>
				<tr>
					<td>Product Description</td>
					<td><input type="text" name="product_description"></td>
				</tr>
				<tr>
					<td>Product Price</td>
					<td><input type="text" name="product_listedPrice"></td>
				</tr>
				<tr>
					<td>Product Stock</td>
					<td><input type="text" name="product_stock"></td>
				</tr>
				<tr>
					<td>Product Availability</td>
					<td><input type="text" name="product_availability"></td>
				</tr>
				<tr>
					<td>Product Image</td>
					<td><input type="file" name="product_img"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>
				</table>
				</form>
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