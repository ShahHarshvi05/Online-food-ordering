<?php 
include('constants.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page</title>
    <style>
      Body {
        font-family: Calibri, Helvetica, sans-serif;
        background-color: rgb(50, 50, 50);
        background-image: url('https://t4.ftcdn.net/jpg/02/44/69/87/360_F_244698725_uWdUNY1oiaHthwcb1NK6IqtPuRNKHor2.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: 150%;
		height : 100%;
		}
      button {
        background-color: rgb(68, 159, 229);
        width: 100%;
        color: orange;
        padding: 15px;
        margin: 10px 0px;
        border: none;
        cursor: pointer;
      }
      form {
        border: 3px solid #f1f1f1;
        
        
      }
      input[type="text"],
      input[type="password"] {
        width: 100%;
        margin: 8px 0;
        padding: 12px 20px;
        display: inline-block;
        border: 2px solid rgb(163, 216, 247);
        box-sizing: border-box;
      }
      button:hover {
        opacity: 0.7;
      }
      .cancelbtn {
        width: auto;
        padding: 10px 18px;
        margin: 10px 5px;
      }

      .container {
        padding: 25px;
        background-color: grey;
      }
      h1{
        color:rgb(244, 245, 245);
      }
      #form
      {
        justify-content: center;
        align-items: center;
        width: 50%;
        display: block;
        padding-left: 25%;
      }
    </style>
  </head>
  <body>
    <center><h1 >ADMIN LOGIN </FORM></h1></center>
    <div id="form">
    <form>
      <div class="container">
        <label>Username : </label>
        <input
          type="text"
          placeholder="Enter Username"
          name="username"
          required
        />
        <label>Password : </label>
        <input
          type="password"
          placeholder="Enter Password"
          name="password"
          required
        />
        <button type="submit">Login</button>
        <input type="checkbox" checked="checked" /> Remember me
        <button type="button" class="cancelbtn">Cancel</button>
        Forgot <a href="#"> password? </a>
      </div>
    </form>
  </div>
  </body>
</html>
