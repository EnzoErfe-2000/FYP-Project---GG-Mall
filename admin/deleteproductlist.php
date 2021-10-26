<?php
include_once '../admin/include/adminheader.php';
?>
<style>
thead th {
    font-size: 15px;
}
tbody td {
    font-size: 15px;
}
tfoot {
    font-size: 15px;
}
</style>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active" aria-current="page">Product List</li>
            </ol>
          </div>
		<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
					<div class="table-responsive p-3">
					  <table class="table align-items-center table-flush" id="dataTable">
						<thead class="thead-light">
						  <tr>
							<th>ID</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Stock [Availability]</th>
							<th>Price [RM] </th>
							<th>Delete</th>
						  </tr>
						</thead >
						<tfoot class="thead-light">
						  <tr>
							<th>ID</th>
							<th>Product Name</th>
							<th>Category</th>
							<th>Stock [Availability]</th>
							<th>Price [RM]</th>
							<th>Delete</th>
							
						  </tr>
						</tfoot>
						<tbody>
						  
							<?php
							include_once '../include/dbh-inc.php';
							$sql = "SELECT * FROM product";
							$result = $conn->query($sql);
							
								while($data = mysqli_fetch_array($result))
								{
									$d=$data['product_id'];
									echo "<tr>";
									echo "<td>" ."
													<a href = '/fyp-project/product.php?product=$d'vertical-align: text-top;>". $data['product_id'] ."</button>". "</td>";
									echo "<td>" . $data['product_name'] . "</td>";
									echo "<td>" . $data['product_category0'] . " ". $data['product_category1'] ."</td>";
									echo "<td>" . $data['product_stock'] ."  [".$data['product_availability'] ."]". "</td>";
									echo "<td>" . $data['product_listedPrice'] . "</td>";
									echo "<td>".
									   "	
											<input type ='hidden' name='deleteproduct' value=product_id>
											<button type='button'  style='height:25px;' class= 'btn btn-warning btn-sm'>
											<font size='2px'><a href = '/fyp-project/admin/deleteproduct.php?product=$d'>DELETE</a></button>
											
										"			
									."</td>";
									echo "</tr>";
								}
							?>
						  
						</tbody>
					  </table>
					</div>
              </div>
        </div>
</div>
<?php
include_once 'include/adminfooter.php';	
?>
  