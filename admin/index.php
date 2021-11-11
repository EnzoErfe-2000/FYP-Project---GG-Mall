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
else
{
  echo'
    <script>
        location.href = "salesreport.php";
    </script>
  ';
}

?>

<?php
include_once 'include/adminfooter.php';	
?>