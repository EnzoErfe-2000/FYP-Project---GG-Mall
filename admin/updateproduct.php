<?php
include_once '../include/dbh-inc.php';


if(isset($_POST['update_product'])) // when click on Update button
{

    $query ="UPDATE product set product_id='$id',
        product_name='$product_name',
        product_nameExtra='$product_product_nameExtra',
        product_fullName='$product_product_fullName',
        product_category0='$product_category0',
        product_category1='$product_category1',
        product_brand='$product_brand',
        product_description='$product_description',
        product_regularPrice= '$product_regularPrice',
        product_listedPrice='$product_listedPrice',
        product_discountRate='$product_discountRate',
        product_stock='$product_stock',
        product_availability='$product_availability',
         where id='$id'";
    
    $query_run= mysqli_query($conn,$query);

        if($query_run)
        {
            mysqli_close($db); // Close connection
            echo "Product Updated successfully."
            header("location:productlist.php"); // redirects to all records page
            exit;
        }
        else
        {
            echo "Error to update product details..";
        }    	
}
?>  