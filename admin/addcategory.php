<?php
include_once '../admin/include/adminheader.php';	
include_once '../include/dbh-inc.php';

if(isset($_POST['category_submit']))
{
	$newCategoryName =  mysqli_real_escape_string($conn, $_POST['category_name']);
	if($newCategoryName != "")
	{	$sql ="
		INSERT INTO category(category_name) VALUES ('$newCategoryName') 
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Record added sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
	}
}
else if(isset($_POST['subcategory_submit']))
{
	$newSubcategoryName =  mysqli_real_escape_string($conn, $_POST['subcategory_name']);
	if($newSubcategoryName != "")
	{	$sql ="
		INSERT INTO subcategory(subcategory_name) VALUES ('$newSubcategoryName') 
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Record added sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
	}
}

else if(isset($_POST['category_submit_update']))
{
	$updatedCategoryName =  mysqli_real_escape_string($conn, $_POST['categoryList_name']);
	if($updatedCategoryName != "")
	{
		$sql ="
		UPDATE category SET category_name = '$updatedCategoryName'
		WHERE category_id = $_POST[categoryList_id]
		
		
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Record updated sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
		$sql ="
		UPDATE product SET product_category0 = '$updatedCategoryName'
		WHERE product_categoryId = $_POST[categoryList_id];
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Product records updated sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
	}
}
else if(isset($_POST['category_submit_delete']))
{
	$sql ="
	DELETE FROM category
	WHERE category_id = $_POST[categoryList_id]
	";
	if($conn->query($sql) === TRUE)
	{
		echo "
		<script>
		  alert('Record deleted sucessfully.');
		  location.href = 'addcategory.php';
		</script>";
	}
	else
	{
		echo "Error" ;
	}
	
	$sql ="
	UPDATE product SET product_category0 = '-', product_categoryId = '' 
	WHERE product_categoryId = $_POST[categoryList_id];
	";
	if($conn->query($sql) === TRUE)
	{
		echo "
		<script>
		  alert('Product records updated sucessfully.');
		  location.href = 'addcategory.php';
		</script>";
	}
	else
	{
		echo "Error" ;
	}
}


else if(isset($_POST['subcategory_submit_update']))
{
	$updatedSubcategoryName =  mysqli_real_escape_string($conn, $_POST['subcategoryList_name']);
	if($updatedSubcategoryName != "")
	{
		$sql ="
		UPDATE subcategory SET subcategory_name = '$updatedSubcategoryName'
		WHERE subcategory_id = $_POST[subcategoryList_id]
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Record updated sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
		$sql ="
		UPDATE product SET product_category1 = '$updatedSubcategoryName'
		WHERE product_subcategoryId = $_POST[subcategoryList_id];
		";
		if($conn->query($sql) === TRUE)
		{
			echo "
			<script>
			  alert('Product records updated sucessfully.');
			  location.href = 'addcategory.php';
			</script>";
		}
		else
		{
			echo "Error" ;
		}
	}
}
else if(isset($_POST['subcategory_submit_delete']))
{
	$sql ="
	DELETE FROM subcategory
	WHERE subcategory_id = $_POST[subcategoryList_id]
	";
	if($conn->query($sql) === TRUE)
	{
		echo "
		<script>
		  alert('Record deleted sucessfully.');
		  location.href = 'addcategory.php';
		</script>";
	}
	else
	{
		echo "Error" ;
	}
	
	$sql ="
	UPDATE product SET product_category1 = '-', product_subcategoryId = '' 
	WHERE product_subcategoryId = $_POST[subcategoryList_id];
	";
	if($conn->query($sql) === TRUE)
	{
		echo "
		<script>
		  alert('Product records updated sucessfully.');
		  location.href = 'addcategory.php';
		</script>";
	}
	else
	{
		echo "Error" ;
	}
}
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
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">New Category</h6>
				</div>
				<div class="card-body">
					<form method="post" action="addcategory.php" id="FormCategory">
						<div class="form-group row">
							<label for="category_name" class="col-sm-3 col-form-label">New Category Name</label>
							<div class="col-sm-9">
								<input class="form-control" type="text" name="category_name" placeholder="CategoryName">
							</div>
						</div>
						<div class="form-group row">
						  <div class="col-sm-10">
							<button type="submit" name="category_submit" class="btn btn-primary" value="FormCategory">Upload</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">New Subcategory</h6>
				</div>
				<div class="card-body">
					<form method="post" id="FormSubcategory">
						<div class="form-group row">
							<label for="subcategory_name" class="col-sm-3 col-form-label">New Subcategory Name</label>
							<div class="col-sm-9">
								<input class="form-control " type="text"name="subcategory_name" placeholder="SubcategoryName">
							</div>
						</div>
						<div class="form-group row">
						  <div class="col-sm-10">
							<button type="submit" name="subcategory_submit" class="btn btn-primary" value="FormSubcategory">Upload</button>
						  </div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="card mb-4">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Category List</h6>
						</div>
						<div class="card-body">
								<table class="table table-bordered table-flush table-hover table-condensed">
									<thead class="thead-light">
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Action</th>
											<th></th>
										</tr>
									</thead>
				  
									<tbody>
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
											foreach($categories as $row):
										?>
											<tr>
												<form method="post" name="FormCategoryList[<?=$row['category_id']?>]">
													<td><input class="form-control" readonly name='categoryList_id' value="<?=$row['category_id']?>" placeholder="CATEGORY ID"/></td>
													<td><input class="form-control" type="text" name='categoryList_name' value="<?=$row['category_name']?>" placeholder=" CATEGORY NAME"/></td>
													<td>
														<button onclick="postCategoryRow(<?=$row['category_id']?>)" name='category_submit_update' style='height:24px;' class= 'btn btn-light btn-sm bg-primary'>
															<span class="text-white">UPDATE</span>
														</button>
													</td>
													<td>
														<button onclick="postCategoryRow(<?=$row['category_id']?>)" name='category_submit_delete' style='height:24px;' class= 'btn btn-light btn-sm bg-danger'>
															<span class="text-white">DELETE</span>
														</button>
													</td>
												</form>
											</tr>
										<?php
											endforeach;
										?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card mb-4">
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Subcategory List</h6>
						</div>
						<div class="card-body">
							<table class="table table-bordered table-flush table-hover table-condensed">
								<thead class="thead-light">
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Action</th>
										<th></th>
									</tr>
								</thead>
			  
								<tbody>
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
										foreach($subcategories as $row):
									?>
										<tr>
											<form method="post" name="FormSubcategoryList[<?=$row['subcategory_id']?>]">
												<td><input class="form-control" readonly name='subcategoryList_id' value="<?=$row['subcategory_id']?>" placeholder="SUBCATEGORY ID"/></td>
												<td><input class="form-control" type="text" name='subcategoryList_name' value="<?=$row['subcategory_name']?>" placeholder="SUBCATEGORY NAME"/></td>
												<td>
														<button onclick="postSubcategoryRow(<?=$row['subcategory_id']?>)" name='subcategory_submit_update' style='height:24px;' class= 'btn btn-light btn-sm bg-primary'>
															<span class="text-white">UPDATE</span>
														</button>
													</td>
													<td>
														<button onclick="postSubcategoryRow(<?=$row['subcategory_id']?>)" name='subcategory_submit_delete' style='height:24px;' class= 'btn btn-light btn-sm bg-danger'>
															<span class="text-white">DELETE</span>
														</button>
													</td>
											</form>
										</tr>
									<?php
										endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

<?php
include_once 'include/adminfooter.php';	
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"gg_mall");
?>

<script>
function postCategoryRow(n)
{
	document.FormCategoryList[n].submit();
}
</script>