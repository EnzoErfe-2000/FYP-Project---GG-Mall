<?php
include_once '../admin/include/adminheader.php';

if(!isset($_SESSION["loggedin"]))
{
  echo'
    <script>
        alert("Please login first");
        location.href = "login.php";
    </script>
  ';
}

?>

<?php
include_once '../include/dbh-inc.php';

$id = $_GET['product']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM product where product_id = '$id'"); // delete query

if($del)
{
    echo "
    <script>
      alert('Product Deleted.');
      location.href = 'deleteproductlist.php';
    </script>";
}
else
{
    echo "Error deleting record ! Please check your internet connection and retry again."; // display error message if not delete
}

?>  

<?php
include_once 'include/adminfooter.php';	
?>