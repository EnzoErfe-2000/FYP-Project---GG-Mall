<?php
include_once '../admin/include/adminheader.php';
include_once '../include/dbh-inc.php';

?>
<?php
if(!isset($_SESSION["loggedin"]))
{
  echo'
    <script>
        alert("Please login first");
        location.href = "login.php";
    </script>
  ';
}

	function daysInMonth($month)
	{
		$endOfMonth = 30;
		if($month > 1 || $month < 13)
		{
			$endOfMonth = 30;
			if($month > 1 || $month < 13)
			{
				if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12)
				{
					$endOfMonth = 31;
				}
				else if($month == 4 || $month == 6 || $month == 9 || $month == 11)
				{
					$endOfMonth = 30;
				}
				else if($month == 2)
				{
					$endOfMonth = 29;
				}
				return $endOfMonth;
			}
		}
	}
	if(isset($_GET['month']))
	{
		$currentMonth = $_GET['month'];
	}
	else
	{
		$currentMonth = date("m");
	}
	$daysInMonth = daysInMonth($currentMonth);
	$daysInMonthArray = range(1,$daysInMonth);
	$currentDayInCurrentMonth = date("d");
	
	$sql = "
	SELECT 
	DAY(CAST(orders.orders_creationDate AS DATE)) AS 'DAY',
    sum(ordersDetail.ordersDetail_quantity) AS 'QTY',
	sum(ordersDetail.ordersDetail_subtotal) AS 'SALES'
	FROM orders 
    LEFT JOIN ordersdetail ON ordersDetail.ordersDetail_ordersId = orders.orders_id
    WHERE 
	MONTH(orders.orders_creationDate) = $currentMonth
	GROUP BY DAY(orders.orders_creationDate)
	";
	
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		//mysqli_close($conn);
	}
	else
	{
		//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($result);

	$salesData = array();
	$quantityData = array();
	if($currentMonth != date("m"))
	{
		$salesData = array_fill(0, daysInMonth($_GET['month']), 0);
		$quantityData = array_fill(0, daysInMonth($_GET['month']), 0);
		
	}
	else
	{
		$salesData = array_fill(0, $currentDayInCurrentMonth, 0);
		$quantityData = array_fill(0, $currentDayInCurrentMonth, 0);
	}
	foreach($result as $rowDeets)
	{
		$dayWithSales = $rowDeets['DAY'];
		$salesData[$dayWithSales - 1] = $rowDeets['SALES'];
		$quantityData[$dayWithSales - 1] = $rowDeets['QTY'];
	}
?>

        <div class="container-fluid" id="container-wrapper">
			<!-- Container Fluid-->
			<div class="col-lg-12">
				<div class="py-3 d-flex flex-row align-items-center justify-content-between">
					<h6></h6>
					<h6>
						<button type="button" class="btn btn-info mb-1" href="generateSalesReport.php" id="download">Generate Report</button>
					</h6>
				</div>
			</div>
			<div id="report">
				<div class="container-fluid" id="container-wrapper">
					<div class="mb-4"></div>
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800" id="reportType">Sales Report</h1>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="./">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Sales Report</li>
						</ol>
					</div>
					<!-- Row -->
					<div class="row">
						<!-- Area Charts -->
						<div class="col-lg-12">
							<div>
								<div class="card mb-4">
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">This Month (<?php if(isset($_GET['month'])){echo date('F', mktime(0,0,0,$_GET['month'],10));}else{echo date("F");}?>)</h6>
										<h6 class="m-0 font-weight-bold text-primary">
										<span>
											<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonMonth"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?php if(isset($_GET['month'])){echo date('M', mktime(0,0,0,$_GET['month'],10));}else{echo date("M");}?>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMonth">
												<a class="dropdown-item" onclick="" href="salesreport.php?month=1">Jan</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=2">Feb</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=3">Mar</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=4">Apr</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=5">May</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=6">Jun</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=7">Jul</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=8">Aug</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=9">Sep</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=10">Oct</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=11">Nov</a>
												<a class="dropdown-item" onclick="" href="salesreport.php?month=12">Dec</a>
											</div>
										</span>
										<span>
											<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonYear"
											data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<?=date("Y")?>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonYear">
												<a class="dropdown-item" onclick="">2021</a>
											</div>
										</span>
										</h6>
									</div>
							
									<div class="card-body"style="width: 595pt;">
										<div class="chart-area">
											<canvas id="currentMonthChart"></canvas>
										</div>
										<hr>				  
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 mb-4">
									<!-- Simple Tables -->
									<div class="card">
										<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
											<h6 class="m-0 font-weight-bold text-primary">This Month's Sales</h6>
										</div>
										<div class="table-responsive">
											<table class="table align-items-center table-flush">
												<thead class="thead-light">
												<tr>
													<th>Date</th>
													<th>Quantity Sold</th>
													<th>Total Sales Amount</th>
												</tr>
												</thead>
												<tbody>
													<?php for($i=0; $i < count($salesData); $i++)
													{
														$currentDay = $i+1;
														if($quantityData[$i] > 0){?>
													<tr>
														<td><?=$currentDay?></a></td>
														<td><?=$quantityData[$i]?></td>
														<td>RM <?=$salesData[$i]?></td>
													</tr>
													<?php }
													}?>
												</tbody>
											</table>
										</div>
										<div class="card-footer">
										</div>
									</div>
								</div>
							</div>
							<span class="break-page"></span>
							<div class="mb-4"></div>
							<div class="d-sm-flex align-items-center justify-content-between mb-4">
								<h1 class="h3 mb-0 text-gray-800">Sales Details</h1>
							</div>
						
							<?php $First=0;for($i=0; $i < count($salesData); $i++)
								{
									$currentDay = $i+1;
									if($quantityData[$i] > 0)
									{
										if($First != 0)
										{
											echo '<span class="break-page"></span>';
										}
										else
										{
											$First =1;
										}
							?>
							<div class="mb-4"></div>
							<div class="row" id="salesDetailRow">
								<div class="col-lg-12 mb-4">
									<div class="card">
										<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
											<h6 class="m-0 font-weight-bold text-primary">Sales on <?=$currentDay?> / <?=$currentMonth?> / <?= date("y") ?></h6>
										</div>
										<div class="table-responsive">
											<table class="table align-items-center table-flush">
												<thead class="thead-light">
													<tr>
														<th style="text-align:center">Product ID</th>
														<th style="width:400px;">Product Name</th>
														<th>Quantity</th>
														<th>Subtotal</th>
														<th>Associated Order ID</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php
													$getDay = $currentDay;
													$sql = "
													SELECT ordersdetail.*, product.product_name, product.product_img FROM ordersdetail 
													LEFT JOIN product ON  ordersDetail_productId = product.product_id
													WHERE 
													ordersDetail_ordersId IN(
													SELECT orders_id FROM orders WHERE DAY(orders_creationdate) = $getDay
													AND
													MONTH(orders_creationdate) = $currentMonth
													)
													";
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
													$salesDetail = mysqli_stmt_get_result($stmt);
													$salesDetailRow = mysqli_fetch_assoc($salesDetail);
												?>
												<?php foreach($salesDetail as $salesDetails):?>
													<tr>
														<td>
															<div style="text-align:center">
																<img src="product_img/<?=$salesDetails['product_img']?>" height="50px" />
																<h6>
																<a href="editproduct.php?product=<?=$salesDetails['ordersDetail_productId']?>" class="btn btn-sm btn-primary"><?=$salesDetails['ordersDetail_productId']?></a>
															</div>
														</td>
														<td><?=$salesDetails['product_name']?></td>
														<td><?=$salesDetails['ordersDetail_quantity']?></td>
														<td><?=$salesDetails['ordersDetail_subtotal']?></td>
														<td><?=$salesDetails['ordersDetail_ordersId']?></td>
														<td><a href="orderlist.php?order=<?=$salesDetails['ordersDetail_ordersId']?>" class="btn btn-sm btn-primary">View Order</a></td>
													</tr>
												<?php endforeach;?>
													<tr style="font-weight:bold">
														<td></td>
														<td>Total:</td>
														<td><?=$quantityData[$getDay-1]?></td>
														<td colspan=3>RM <?=$salesData[$getDay-1]?></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="card-footer"></div>
									</div>
								</div>
							</div>
							<?php 	}
								}
							?>
						</div>
					</div>
					<!-- Modal Logout -->
					<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
					aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to logout?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
									<a href="login.html" class="btn btn-primary">Logout</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="https:cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
			<script src="js/pdf.js"></script>
			<!---Container Fluid-->
		</div>
<?php
include_once 'include/adminfooter.php';	
?>
<script>
var ctx = document.getElementById("currentMonthChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?=implode(", ", $daysInMonthArray)?>],
    datasets: [{
      label: "Earnings",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.5)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?=implode(", ", $salesData)?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>

