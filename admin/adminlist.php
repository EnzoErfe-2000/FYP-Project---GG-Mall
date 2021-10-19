<?php
include_once '../admin/include/adminheader.php';	
?>
<div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Admin List</h6>
      </div>
      <div class="table-responsive p-3">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
          <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact No</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact No</th>
            </tr>
          </tfoot>
            <?php 
                $sql = "SELECT * FROM admin";
                if($result = mysqli_query($conn, $sql))
                {
                while($row=mysqli_fetch_assoc($result))
                {
                    echo'
                    <tbody>
                        <tr>
                        <td>'.$row['admin_id'].'</td>
                        <td>'.$row['admin_name'].'</td>
                        <td>'.$row['admin_emailAddress'].'</td>
                        <td>'.$row['admin_contactNo'].'</td>
                        </tr>
                    </tbody>
                    
                    ';
                }
                } 
            ?>
        </table>
      </div>
    </div>
  </div>
<?php
include_once 'include/adminfooter.php';	
?>