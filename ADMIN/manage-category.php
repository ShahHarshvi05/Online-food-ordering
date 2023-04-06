<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>
				<br>
 <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
			if(isset($_SESSION['delete'])) 
			{
                echo $_SESSION['delete']; 
                unset($_SESSION['delete']);
            }
			if(isset($_SESSION['update'])) 
			{
                echo $_SESSION['update']; 
                unset($_SESSION['update']);
            }
        ?>
		<br><br>
				<!-- button to add admin -->
				<a href="add-category.php" class="btn-primary">Add Category</a>
				<br /><br /><br />

                <table class="tbl-full">
				<tr>
				<th> Sr.no </th>
				<th> Title</th>
				<th> Image name </th>
				<th> Featured </th>
				<th> Active </th>
				<th> action </th>
				</tr>
				 <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_category";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    $image_name=$rows['image_name'];
									$featured=$rows['featured'];
									$active=$rows['active'];
                                    //Display the Values in our Table
				?>									
						<tr>
						 <td><?php echo $sn++; ?>. </td>
						 <td><?php echo $title; ?></td>
						<td>
						<?php  
						   //Chcek whether image name is available or not
							if($image_name!="")
							{
								//Display the Image
								?>
								
								<img src="../images/category/<?php echo $image_name; ?>" width="100px" >
								
								<?php
							}
							else
							{
								//DIsplay the MEssage
								echo "<div class='error'>Image not Added.</div>";
							}
						?>
				</td>
				 <td><?php echo $featured; ?></td>
				 <td><?php echo $active; ?></td>
				<td><a href="update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update category</a>
					<a href="delete-category.php?id=<?php echo $id;?>" class="btn-danger">Delete category</a>
				</td>
				</tr>
				<?php
							
							}
							}
				 else
                        {
                            //WE do not have data
                            //We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>
	</table>
				 </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>