<?php 
include('constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order now</title>
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<!--Header section start-->
<header>
    <div id="logo">
        <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/food-delivery-logo-design-template-81e66a64d1731e713a81885d78410931_screen.jpg?ts=1619681335" alt="logo">
    </div>
    <nav class="navbar">
        <a class="active" href="home.php">Home</a>
        <a href="#"  id="cart" class="fas fa-shopping-cart"><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
    </nav>
</header>>    
 <!--side bar-->
 <div id="bg">

<nav class="sidebar">
    
    <div class="text">
    <a href="#"><i class="fa fa-home"> </i></a>
        <!-- CAtegories Section Starts Here -->
            <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $cid = $row['id'];
                        $title = $row['title'];
                       
                        ?>
						<ul>
							<li><a href="#<?php echo $title; ?>"> <?php echo $title; ?></a></li> 
						</ul>
                        <?php
						
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
</div>
</nav>
<!--Side bar ends-->
<section class="home" id="home">
    <div class="barb">
    
    <div class="cont">
        <iframe width="420" height="315"
src="https://www.youtube.com/embed/wj9NMpwVugQ?autoplay=1&mute=1&loop=1&playlist=wj9NMpwVugQ&loop=1">
</iframe>
        </div>
        </div>
</section>
 <?php 
                //Create SQL Query to Display CAtegories from Database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values like id, title, image_name
                        $cid = $row['id'];
                        $title = $row['title'];
                       
              ?>
			  <section class="pizzamania" id="<?php echo $title; ?>">
    <h2 class="dominos">Home Delivery</h2>
    <hr class="line">
	<h4><?php echo $title ?></h4>
	<div class="box-mania">
	 <?php 
            
            //Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' AND category_id = '$cid' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
						<div class="box">
							<img src="../images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza">
							<h3><?php echo $title?></h3>
							<div class="stars">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half-alt"></i>
					
							</div>
							<span><?php echo $price?></span>
							<br>
							  <a href="payment.php?food_id=<?php echo $id; ?>" class="btn">Add to cart</a>
							<!--<a href="#" class="btn">Add to cart</a>-->
						</div>
                    <?php
                }
            }
            else
            {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }
            ?>
			</div></section>
			  <?php
						
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
</section>

</body>
</html>