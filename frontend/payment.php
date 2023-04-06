<?php
include('constants.php'); 

        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
				
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location: home.php');
            }
        }
        else
        {
            //Redirect to homepage
            header('location:home.php');
        }
		
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Billing Information</title>
        <link rel="stylesheet" href="payment.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="left">
                    <h3>Billing Information</h3>
                    <form action="" method="POST">
                        Full name
                        <input type="text" name="full-name" placeholder="Enter name">
                        Contact No
                        <input type="text" name="contact" placeholder="Enter Conatct no ">
                        Address
                        <input type="text" name="address" placeholder="Enter your address">
                        Dish Name 
                        <input type="text" name="food" placeholder="Enter your City" value="<?php echo $title; ?>">
                       <div id="zip">
                            <label>
                                Quantity
                                <input type="number" name="qty" class="input-responsive" value="1" required>
                            </label>
                            <label>
                                Price 
                                <input type="text" name="price" placeholder="Pincode" value="<?php echo $price; ?>">
                            </label>
                        </div>


                </div>
               <div class="right">
                    <h3>Payment Information</h3>
                   
                        Accepted Card<br>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/1200px-Visa.svg.png" width="33">
                        <img src="https://i.ytimg.com/vi/EMJHsee6ZE8/maxresdefault.jpg" width="33">
                        <img src="https://m.economictimes.com/thumb/msid-92061657,width-1200,height-900,resizemode-4,imgsize-10384/axis-bank-and-indian-oil-launch-co-branded-rupay-contactless-credit-card.jpg" width="33">
                        <br>
						<label>
                        Card Details<br>
                        <input type="text" name="" placeholder="Enter Card number">
						</label><br>
                        <label>
						Exp Month<br>
                        <input type="text" name="" placeholder="Enter Month">
						</label><br>
                       <div id="zip">
                        <label>
                           Exp Year<br>
                            <select>
                                    <option>Choose Year..</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                            </select>
                        </label></br>
                            <label>
                               CVV<br>
                                <input type="number" name="" placeholder="CVV">
                            </label><br>
                        </div>
 <input type="submit" name="submit" value="Proceed to checkout">
                    </form>
                   
                </div>
            </div>
        </header>
		  <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location: end.php');
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location: order.php');
                    }

                }
            
            ?>

        </div>
    </section>
    </body>
</html>