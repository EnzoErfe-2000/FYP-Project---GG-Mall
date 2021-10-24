<?php
include_once '../admin/include/adminheader.php';	
?>
<?php
$sql = "SELECT * FROM orders;";
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
$orders = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($orders);
?>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
          </div>
		  


          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php if(empty($row)): ?>
					<tr>
						<td colspan="4"><div style="text-align:center;">Order list is empty!<br/>No orders have been created yet.</div></td>
					</tr>
					<?php else: ?>
					<?php foreach($orders as $order):?>
					<tr>
                        <td><a href="#"><?=$order['orders_id']?></a></td>
                        <td><?=$order['orders_customerId']?></td>
                        <td><span class="badge <?php if($order['orders_status'] == "Pending"){echo"badge-danger";}else{echo"badge-success";}?>"><?=$order['orders_status']?></span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                    </tr>
					<!--
                      <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA5324</a></td>
                        <td>Jaenab Bajigur</td>
                        <td>Gundam 90' Edition</td>
                        <td><span class="badge badge-warning">Shipping</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA8568</a></td>
                        <td>Rivat Mahesa</td>
                        <td>Oblong T-Shirt</td>
                        <td><span class="badge badge-danger">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1453</a></td>
                        <td>Indri Junanda</td>
                        <td>Hat Rounded</td>
                        <td><span class="badge badge-info">Processing</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1998</a></td>
                        <td>Udin Cilok</td>
                        <td>Baby Powder</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
					  -->
					<?php endforeach;?>
					<?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
		  
		  
</div>
<?php
include_once 'include/adminfooter.php';	
?>