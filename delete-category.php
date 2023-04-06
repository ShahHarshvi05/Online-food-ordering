<?php
include('constants.php');
 // 1. get the ID of category to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete category
    $sql = "DELETE FROM tbl_category WHERE id=$id";

	//3. execute the query
	$res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and category Deleted
        //echo "category Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>category Deleted Successfully.</div>";
        //Redirect to Manage category Page
        header('location: manage-category.php');
    }
    else
    {
        //Failed to Delete category
        //echo "Failed to Delete category";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete category. Try Again Later.</div>";
        header('location: manage-category.php');
    }

    //3. Redirect to Manage category page with message (success/error)

?>