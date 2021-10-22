<?php
include_once '../admin/include/adminheader.php';
?>

<?php
include_once '../include/dbh-inc.php';

$id = $_GET['product']; // get id through query string

$del = mysqli_query($conn,"DELETE FROM product where product_id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
   
    exit;	
}
else
{
    echo "Error deleting record ! Please check your internet connection and retry again."; // display error message if not delete
}

?>  

<?php
include_once 'include/adminfooter.php';	
?>