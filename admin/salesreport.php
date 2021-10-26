<?php
include_once '../admin/include/adminheader.php';

function daysInMonth($month)
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

$sql = "SELECT MONTH(CAST(NOW() AS DATE)) AS 'MONTH', DAY(CAST(NOW() AS DATE)) AS 'DAY'";
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
$monthResult = mysqli_stmt_get_result($stmt);
$monthResultRow = mysqli_fetch_assoc($monthResult);
$daysInMonth = daysInMonth($monthResultRow['MONTH']);
$daysInMonthArray = range(1,$daysInMonth);
//echo implode(", ", $daysInMonthArray);

$sql = "
SELECT 
DAY(CAST(orders_creationDate AS DATE)) AS 'DAY',
SUM(orders_total) AS 'SALES' 
FROM orders WHERE 
MONTH(orders_creationDate) = 10

GROUP BY CAST(orders_creationDate AS DATE)
ORDER BY CAST(orders_creationDate AS DATE)
";
//add at line 48: AND orders_status = 'Delivered'
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
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($monthResult);


$salesData = array();
$salesData = array_fill(0, $monthResultRow['DAY'], 0);
//echo count($salesData);

//$daysWithSales = array();
foreach($result as $rowDeets)
{
	//array_push($daysWithSales, $rowDeets['DAY']);
	$dayWithSales = $rowDeets['DAY'];
	$salesData[$dayWithSales - 1] = $rowDeets['SALES'];
	//echo "added $rowDeets[DAY]";
}
//echo "In array: ";
//echo implode(", ", $salesData);
?>

	<!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sales Report</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
            </ol>
          </div>
          <!-- Row -->
          <div class="row">
            <!-- Area Charts -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <!--
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">This Month (<?=date("M")?>)</h6>
				  <h6 class="m-0 font-weight-bold text-primary">
				  <span>
				  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonMonth"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?=date("M")?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMonth">
                      <a class="dropdown-item" onclick="">Jan</a>
                      <a class="dropdown-item" onclick="">Feb</a>
                      <a class="dropdown-item" onclick="">Mar</a>
					  <a class="dropdown-item" onclick="">Apr</a>
                      <a class="dropdown-item" onclick="">May</a>
                      <a class="dropdown-item" onclick="">Jun</a>
					  <a class="dropdown-item" onclick="">Jul</a>
                      <a class="dropdown-item" onclick="">Aug</a>
                      <a class="dropdown-item" onclick="">Sep</a>
					  <a class="dropdown-item" onclick="">Oct</a>
                      <a class="dropdown-item" onclick="">Nov</a>
                      <a class="dropdown-item" onclick="">Dec</a>
                    </div>
					<span>
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButtonYear"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?=date("Y")?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonYear">
                      <a class="dropdown-item" onclick="">2021</a>
                    </div>
				  </h6>
				</div>
				-->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="currentMonthChart"></canvas>
                  </div>
                  
				  <hr>
                  <!--
				  Styling for the area chart can be found in the
                  <code>/js/demo/chart-area-demo.js</code> file.
				  -->
				  <div class="py-3 d-flex flex-row align-items-center justify-content-between">
				    <h6></h6>
				    <h6>
				      <button type="button" class="btn btn-info mb-1">Generate Report</button>
				    </h6>
				  </div>
				</div>
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
        <!---Container Fluid-->

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