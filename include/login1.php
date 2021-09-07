<?php 
include("data.php");
?>
<!DOCTYPE HTML>
<html>
<head>

    
<title>Watches an E-Commerce online Shopping Category Flat Bootstrap Responsive Website Template| Login :: w3layouts</title>    

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>    
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    
    
    
</head>   
<body>
	<div class="men_banner">
   <div class="container">
   	  	<div class="header_top">
   	  	  
	  </div>
	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="index.php"><span class="m_1">EZ</span>watch</a></h1>
	   </div>
   	   <div class="menu">
	     <ul class="megamenu skyblue">
			<li><a class="color3" href="index.php">HOME</a>
				
			</li>
			<li><a class="color4" href="brand(index).php">BRANDS</a>
				
				</li>				
				<li><a class="color10" href="product(index).php">PRODUCTS</a></li>
				<li ><a  href="login1.php">LOGIN</a></li>
				<li><a class="color7" href="register.php">REGISTER</a></li>
				<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	        </div>
	    </div>
        
   </div>
     <div class="account-in">
   	 <div class="container">
   	   <h3>Account</h3>
		<div class="col-md-7 account-top">
		  <form method="post">
			<div> 	
				<span>Username*</span>
				 <input type="text"  name="username" value="">
			</div>
			<div> 
				<span class="pass">Password*</span>
				<input type="password"  name="password" value="">
			</div>				
				<input type="submit" name="login" value="login">
              <p>&nbsp;</p>
           <p >   <a style="color:blue" href="forgotpass.php">Forgot Password?</a></p>
		   </form>
		</div>
		
	    <div class="clearfix"> </div>
	  </div>
   </div>
     <div class="footer">
   	 <div class="container">
   	 
   		<div class="cssmenu">
		   <ul>
		
			<li><a href="#">Feedback</a></li>
			<li><a href="#">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		  </ul>
		</div>
	
	    <div class="clearfix"></div>
	    <div class="copy">
           <p> &copy; 2019 EZWATCH. All Rights Reserved </p>
	    </div>
   	</div>
   </div>	

    
</body>
</html>
<?php 
      
    
    if(isset($_POST['login']) ){
        
    $username = $_POST['username'];
    $password = $_POST['password'];
    session_start();    
    $sql = "SELECT * FROM user WHERE Username = '$username' AND User_Password='$password'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    //
  
    
        if(mysqli_num_rows($result)!=1)
		{
	         echo "<script type='text/javascript'>alert('Invalid Username or Password.');</script>";
            
		}
		else
		{        session_start();      
				$_SESSION["id"] = $row["User_ID"];
				$_SESSION["loggedin"] = 1;
          
         //
         echo "<script> window.location.assign('welcome1.php'); window.history.forward();</script>";
       
                //echo "<script> window.location.assign('welcome1.php'); </script>";
                //header('Location: welcome.php');
				
				
		}
    
   	
		mysqli_close($connect);
        
    }

    
?>