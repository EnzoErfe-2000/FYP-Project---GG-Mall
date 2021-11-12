<?php
session_start();
include_once '../include/dbh-inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../img/logo1~1.png" rel="icon">
  <title>GG Mall Admin</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../img/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">GG Mall Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
       
	  <!-- Order -->
	  <li class="nav-item">
        <a class="nav-link collapsed" href="../admin/orderlist.php" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Order</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../admin/orderlist.php">Order List</a>
          </div>
        </div>
      </li>
	    <!-- Product -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="productlist.php" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Product</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="productlist.php">Product List</a>
            <a class="collapse-item" href="addproduct.php">Add Product</a>
			<a class="collapse-item" href="addcategory.php">Category Lists</a>
            <a class="collapse-item" href="deleteproductlist.php">Delete Product</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="customerlist.php" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Customer</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="customerlist.php">Customer List</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true"
          aria-controls="collapseList">
          <i class="fas fa-fw fa-table"></i>
          <span>Admin</span>
        </a>
        <div id="collapseList" class="collapse" aria-labelledby="headingList" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <ul>
              <?php
                if($_SESSION['status'] == "superadmin")
                {
                  echo '<li>
                    <a class="collapse-item" href="adminlist.php">Admin List</a>
                  </li>';
                }
              ?>
              <li>
                <a class="collapse-item" href="adminchange.php">Change Password</a>
              </li>
            </ul>
          </div>
        </div>
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGraph" aria-expanded="true"
          aria-controls="collapseGraph">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Statistics</span>
        </a>
        <div id="collapseGraph" class="collapse" aria-labelledby="headingGraph" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="salesreport.php">Sales Report</a>
			<a class="collapse-item" href="inventoryreport.php">Inventory Report</a>
			
          </div>
        </div>
      </li>
 
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        GG Mall
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>User site</span>
        </a>
        <div id="collapsePage" class="collapse show" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pages</h6>
            <a class="collapse-item" href="../index.php">Home</a>
            <a class="collapse-item" href="../register.php">Register</a>
			<a class="collapse-item" href="../about.php">About us</a>
			<a class="collapse-item " href="../products.php">Products</a>
            <a class="collapse-item " href="../services.php">Services</a>
			<a class="collapse-item " href="../contact.php">Contact</a>
            <a class="collapse-item" href="../cart.php">Cart</a>
			<a class="collapse-item" href="../checkout.php">Checkout</a>
			<a class="collapse-item" href="../error_404.php">404 error</a>
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            
          
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}else{echo "Login";}?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <a href="adminlogout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i><?php if(isset($_SESSION['name'])){echo "Logout";}else{echo "Login";}?></a> 
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->