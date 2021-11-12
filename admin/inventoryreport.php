<?php
include_once '../admin/include/adminheader.php';
include_once '../include/dbh-inc.php';
if(!isset($_SESSION["loggedin"]))
{
	echo'
		<script>
			alert("In insert, Please login first");
			location.href = "login.php";
		</script>
	';
}
	$sql = "
	SELECT 
	product.*, 
    COALESCE(sum(ordersdetail.ordersDetail_quantity), 0) AS 'custOrders', 
    (product.product_stock - sum(ordersdetail.ordersDetail_quantity)) AS 'onHand',
    product_stock * product_listedPrice AS 'inventoryValue',
    orders.orders_status
	FROM orders, product
	LEFT JOIN ordersdetail ON ordersDetail.ordersDetail_productId = product.product_id
    WHERE ordersdetail.ordersDetail_ordersId = orders.orders_id 
    AND orders.orders_status = 'Pending'
	GROUP BY product_id
    ORDER BY product_id";
	
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		mysqli_close($conn);
	}
	else
	{
		//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	mysqli_stmt_execute($stmt);
	$products = mysqli_stmt_get_result($stmt);
?>
		<div id="report">
        <div class="container-fluid" id="container-wrapper">

		<!-- Container Fluid-->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800" id="reportType">Inventory Report</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Inventory Report</li>
            </ol>
          </div>
          <!-- Row -->
          <div class="row">
          <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Displays inventory changes for all Pending Orders</h6>
                </div>
                <div class="table-responsive" media="print">
                  <table class="table align-items-center table-flush" id="table">
                    <thead class="thead-light">
                      <tr>
                        <th>Prod ID</th>
                        <th style="width=100px;">Prod Name</th>
                        <th>Category 0</th>
                        <th>Category 1</th>
                        <th>Brand</th>
                        <th>Inventory Value (RM)</th>
                        <th>In Stock</th>
                        <th>Customer Order</th>
                        <th>Stock Remaining</th>
                        <th>Need Restock?</th>
                      </tr>
                    </thead>
                    <tbody>
						<?php foreach($products as $product):?>
						<tr>
							<td><a href="editproduct.php?product=<?=$product['product_id']?>"><?=$product['product_id']?></a></td>
							<td><?=$product['product_name']?></td>
							<td><?=$product['product_category0']?></td>
							<td><?=$product['product_category1']?></td>
							<td><?=$product['product_brand']?></td>
							<td class="inventoryValue"><?=$product['inventoryValue']?></td>
							<td class="inventoryStock"><?=$product['product_stock']?></td>
							<td class="inventoryCustOrder"><?=$product['custOrders']?></td>
							<td><span <?php if($product['onHand'] < 0){echo 'class="text-danger"';}?>><?php if($product['custOrders']>0){echo $product['onHand'];}else{echo "0";}?></span></td>
							<td><span <?php $productID = $product['product_id'];if($product['onHand'] < 0){echo "class='btn btn-sm btn-danger'> <a href='editproduct.php?product=$productID' class='text-white'>Yes</a>";}else{echo 'class="badge badge-success"> No';}?></span></td>
						</tr>
						<?php endforeach;?>
						<tr style="font-weight:bold">
							<td colspan=5>Total:</td>
							<td id="inventoryValueTotal"></td>
							<td id="inventoryStockTotal"></td>
							<td id="inventoryCustOrderTotal"></td>
							<td id="inventoryRemainingTotal"></td>
							<td></td>
						</tr>
					</tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
		  </div>
		</div>
		<!---Container Fluid-->
		</div>
		<script src="https:cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
		<script src="pdf.js"></script>
        
<?php
include_once 'include/adminfooter.php';	
?>
<script language="javascript" type="text/javascript">
var tds = document.getElementById('table').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'inventoryValue') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseFloat(tds[i].innerHTML);
                }
            }
			document.getElementById('inventoryValueTotal').innerHTML += sum.toLocaleString('en-US', {minimumFractionDigits: 2});
			
var stocks = document.getElementById('table').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < stocks.length; i ++) {
                if(stocks[i].className == 'inventoryStock') {
                    sum += isNaN(stocks[i].innerHTML) ? 0 : parseFloat(stocks[i].innerHTML);
                }
            }
			document.getElementById('inventoryStockTotal').innerHTML += sum;
			
var custOrds = document.getElementById('table').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < custOrds.length; i ++) {
                if(custOrds[i].className == 'inventoryCustOrder') {
                    sum += isNaN(custOrds[i].innerHTML) ? 0 : parseFloat(custOrds[i].innerHTML);
                }
            }
			document.getElementById('inventoryCustOrderTotal').innerHTML += sum;
			
			document.getElementById('inventoryRemainingTotal').innerHTML = parseInt(document.getElementById('inventoryStockTotal').innerHTML) - parseInt(document.getElementById('inventoryCustOrderTotal').innerHTML);
			
</script>