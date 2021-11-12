<?php
include_once '../admin/include/adminheader.php';	
if(!isset($_SESSION["loggedin"]))
{
	echo'
		<script>
			alert("In insert, Please login first");
			location.href = "login.php";
		</script>
	';
}
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
		  
		  
		  
		  
</div>
<?php
include_once 'include/adminfooter.php';	
?>