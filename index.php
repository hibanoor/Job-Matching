<!DOCTYPE html>
<html>
<head>
 <title>Home</title>   
 <style type="text/css">
 #container { margin:0 auto; width:100%; }
 #menu { float:top; background-color: #FCDCBE; overflow: auto; white-space: nowrap;}
 #menu a { display: inline-block;
  color: black;
  text-align: center;
  padding: 20px;
  text-decoration: none;}
  #menu a:hover { background-color: #DCE6E7;}
  #content { line-height: 20px;
   float:bottom;
   margin: 30px;
   padding-bottom: 20px;
   text-align: justify;
   width: 100%;
   color: Black;}
   img { width:100%;}
 </style>
</head>
<?php

session_start();
/*echo '<pre>';
print_r($_SESSION);*/

?>

<body style="background-color:#FFFFFF; background-repeat: round">
  
 <div id="container">
  <div id="menu">
    <a href="index.php">Home</a>
    <a href="#job options">Job Options</a>
    <a href="#requirements">Requirements</a>
    <a href="recommendation.php">Recommendation</a>
    <a href="#prediction">Prediction</a>
    <a href="test.php?update=true">Update</a>
    <?php 
    if(isset($_SESSION['name'])){?>

    <a style="float:right;" href="logout.php">Logout</a>
    <a style="float:right;" href="loginpage.php">Welcome  <?php echo $_SESSION['name'] ?></a>
    <?php }else{?>
    <a style="float:right;" href="loginpage.php">Login / Sign up</a>
    <?php }
    ?>
  </div>

  <?php 
  if(isset($_GET['login'])){ 
    echo '<h2 style="text-align:center; color:#642950">Login Successful!</h2>';
  }
  ?>

  <div id="content">
   <h1 align="center" style="font-size:300%;">DATA PROFESSIONAL JOBS</h1>
   <img src="homepage.jpg" alt="homepage" style= "height:50%;" >
 </div>
</div>
</body>
</html>