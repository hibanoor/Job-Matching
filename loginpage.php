<!DOCTYPE html>
<html>
<head>
 <title>Login Page</title>   
 <style type="text/css">
 #container { margin:0 auto; width:100%; }
 #menu { float:top; background-color: #FCDCBE; overflow: auto; white-space: nowrap;}
 #menu a { display: inline-block;
  color: black;
  text-align: center;
  padding: 20px;
  text-decoration: none;}
  #menu a:hover { background-color: #DCE6E7;}

  form {border: 3px solid #f1f1f1; width: 40%; margin: 0 auto}

  input[type=text], input[type=password] { width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box; }

    button { background-color: #AFF5F7;
     color: black;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     cursor: pointer;
     width: 100%; }

     button:hover { opacity: 0.8; }

     #cancelbtn { width: auto;
      padding: 10px 18px;
      background-color: #F4BBB6; }

      #btncontainer { padding: 16px; }

      span.psw { float: right;
       padding-top: 16px; }

       #signup { float: right; }

       img { width:100%;}
     </style>
   </head>
   
   <body style="background-color:#FFFFFF; background-repeat: round">
    <div id="container">
      <div id="menu">
        <a href="index.php">Home</a>
        <a href="#job options">Job Options</a>
        <a href="#requirements">Requirements</a>
        <a href="recommendation.php">Recommendation</a>
        <a href="#prediction">Prediction</a>
 	<a href="#upload">Upload</a>
        <?php 
      if(isset($_SESSION['name'])){?>

      <a style="float:right;" href="logout.php">Logout</a>
      <a style="float:right;" href="loginpage.php">Welcome  <?php echo $_SESSION['name'] ?></a>
      <?php }else{?>
      <a style="float:right;" href="loginpage.php">Login / Signup</a>
      <?php }
      ?>
      </div>

      <?php 
      if(isset($_GET['logout'])){ 
       echo '<h3 style="text-align:center; color:#642950">Successfully logout.</h3>';
      }
      ?>

      <?php 
      if(isset($_GET['login'])){ 
       echo '<h4 style="text-align:center; color:red">Password and Username are invalid.</h4>';
      }
      ?>

      <center><h2>Login</h2></center>

      <form action="login.php" method="POST">

      <div id="btncontainer">
       <label for="uname"><b>Username</b></label>
       <input type="text" placeholder="Enter Username" name="uname" required>

       <h3></h3>

       <label for="psw"><b>Password</b></label>
       <input type="password" placeholder="Enter Password" name="psw" required>

       <h2></h2>

       <input type="submit" value = "Login" style="width:100%; padding: 10px;">

       <h2></h2>

       <label> 
         <input type="checkbox" checked="checked" name="remember"> Remember me
       </label>

       <label> 
        <span id="signup">New User? <a href="signup_page.php">Sign up for FREE</a></span>
      </label>
    </div>


    <div id="btncontainer" style="background-color:#f1f1f1">
      <input type="reset" value = "Cancel" style="background-color: #C0392B; color: white; width:35%; padding: 10px;">
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>

  </form>

</div>

</body>

</html>