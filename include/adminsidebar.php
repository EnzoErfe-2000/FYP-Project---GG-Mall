<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG Mall Admin Dashboard</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
    list-style: none;
    text-decoration: none;
    margin: 1;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Raleway', sans-serif;
}

body{
    background: #f5f6fa;
}

.wrapper .sidebar{
    background: rgb(184,205,7);
    position: fixed;
    top: 0;
    left: 0;
    width: 225px;
    height: 100%;
    padding: 20px 0;
    transition: all 0.5s ease;
}
.wrapper .sidebar .profile{
    margin-bottom: 30px;
    text-align: center;
}
.wrapper .sidebar .profile h3{
    color: #ffffff;
    margin: 0px 0 0px;
	align-content: left;
}

.wrapper .sidebar .profile p{
    color: rgb(255, 255, 255);
    font-size: 14px;
	font-family: 'Raleway', sans-serif;
}
.wrapper .sidebar ul li a{
    display: block;
    padding: 13px 30px;
    border-bottom: 1px solid #FFFAFA;
    color: rgb(255, 255, 255);
    font-size: 16px;
    position: relative;
	font-family: 'Raleway', sans-serif;
}

.wrapper .sidebar ul li a .icon{
    color: #dee4ec;
    width: 30px;
    display: inline-block;
}
.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
    color: #0c7db1;

    background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
    color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
    display: block;
}
</style>
</head>

    <div class="wrapper">
		<div class="sidebar">
		   <!--profile image & text-->
			<div class="profile">
			<a href="/fyp-project/index.php" class="active">
				<h3>GG Mall</h3>
			</a>
				<p>Admin</p>
			</div>
			<!--menu item-->
			<ul>
				
					<li>
						<a href="/fyp-project/admin/adminhome.php" class="active">
							<span class="item">Home</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/vieworder.php">
							<span class="item">Order</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/productlist.php">
							<span class="item">View Products</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/addproduct.php">
							<span class="item">Add/Edit Products</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/customerlist.php">
							<span class="item">Customer List</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/salesreport.php">
							<span class="item">Sales Reports</span>
						</a>
					</li>
					<li>
						<a href="/fyp-project/admin/adminlist.php">
							<span class="item">Admin</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="item">Settings</span>
						</a>
					</li>
			</ul>
		  
		</div>
    </div>

</html>