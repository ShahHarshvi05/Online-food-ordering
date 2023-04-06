<?php
include('constants.php');
 // 1. get the ID of food to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete food
    $sql = "DELETE FROM tbl_food WHERE id=$id";

	//3. execute the query
	$res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and food Deleted
        //echo "food Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully.</div>";
        //Redirect to Manage food Page
        header('location: manage-food.php');
    }
    else
    {
        //Failed to Delete food
        //echo "Failed to Delete food";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete food. Try Again Later.</div>";
        header('location: manage-food.php');
    }

    //3. Redirect to Manage food page with message (success/error)

?>