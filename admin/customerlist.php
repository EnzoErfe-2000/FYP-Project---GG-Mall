<?php
include_once '../admin/include/adminheader.php';	
?>
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer List</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item">Customer</li>
      <li class="breadcrumb-item active" aria-current="page">Customer List</li>
    </ol>
  </div>

  <div class="row">
    <table class="table table-bordered table-striped table-hover table-condensed">
      <thead>
        <tr>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Customer Email Address</th>
        </tr>
      </thead>
      <?php 
        $sql = "SELECT * FROM customer";
        if($result = mysqli_query($conn, $sql))
        {
          while($row=mysqli_fetch_assoc($result))
          {
            echo'
            <tbody>
                <tr>
                  <td>'.$row['customer_id'].'</td>
                  <td>'.$row['customer_name'].'</td>
                  <td>'.$row['customer_email_address'].'</td>
                </tr>
              </tbody>
            
            ';
          }
        } 
      ?>
    </table>

  </div>
		  
</div>
<?php
include_once 'include/adminfooter.php';	
?>