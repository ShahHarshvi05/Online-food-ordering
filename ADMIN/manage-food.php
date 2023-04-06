<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Food</h1>
                <br><br>
				<a href="add-food.php" class="btn-primary">Add Food </a>
				<br /><br /><br />
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

                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                
                ?>
                <table class="tbl-full">
				<tr>
				 <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
				</tr>
				<tr>
				<?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_food";
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
									$price = $rows['price'];
                                    $image_name=$rows['image_name'];
									$featured=$rows['featured'];
									$active=$rows['active'];
                                    //Display the Values in our Table
				?>									
						<tr>
						 <td><?php echo $sn++; ?>. </td>
						 <td><?php echo $title; ?></td>
						 <td>$<?php echo $price; ?></td>
						<td>
						<?php  
						   //Chcek whether image name is available or not
							if($image_name!="")
							{
								//Display the Image
								?>
								
								<img src="../images/food/<?php echo $image_name; ?>" width="100px" >
								
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
				<td><a href="update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update food</a>
					<a href="delete-food.php?id=<?php echo $id;?>" class="btn-danger">Delete food</a>
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
                                <td colspan="6"><div class="error">No food Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>
				</table>
				 </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>