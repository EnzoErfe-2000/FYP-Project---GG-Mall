<?php
include_once '../admin/include/adminheader.php';
?>
<style>
thead th {
    font-size: 12px;
}
tbody td {
    font-size: 11px;
}
tfoot {
    font-size: 11px;
}
</style>
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
                        <th>Product Description</th>
                        <th>Price [RM] </th>
                      </tr>
                    </thead >
                    <tfoot class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Stock [Availability]</th>
                        <th>Product Description</th>
                        <th>Price [RM]</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
						<?php
						include_once '../include/dbh-inc.php';
						$sql = "SELECT * FROM product";
						$result = $conn->query($sql);
							while($data = mysqli_fetch_array($result))
							{
								echo "<tr>";
								echo "<td>" . $data['product_id'] . "</td>";
								echo "<td>" . $data['product_name'] . "</td>";
								echo "<td>" . $data['product_category0'] . " ". $data['product_category1'] ."</td>";
								echo "<td>" . $data['product_stock'] ."[".$data['product_availability'] ."]". "</td>";
								echo "<td>" . $data['product_description'] . "</td>";
								echo "<td>" . $data['product_listedPrice'] . "</td>";
								echo "</tr>";
							}
						?>
					  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
<?php
include_once 'include/adminfooter.php';	
?>
  