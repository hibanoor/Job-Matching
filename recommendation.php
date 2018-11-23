<!DOCTYPE html>
<html>
<head>
  <title>Recommendation</title>
  <style type="text/css">
  #container { margin:0 auto; width:100%; }
  #menu { float:top; background-color: #FCDCBE; overflow: auto; white-space: nowrap;}
  #menu a { display: inline-block;
    color: black;
    text-align: center;
    padding: 20px;
    text-decoration: none;}
    #menu a:hover { background-color: #E1DEF2;}

    form {border: 3px solid #f1f1f1; width: 40%; margin: 0 auto}

    input[type=String], input[type=password] { width: 100%;
     padding: 12px 20px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     box-sizing: border-box; }

     button { background-color: #f1f1f1;
       color: black;
       padding: 14px 20px;
       margin: 8px 0;
       border: none;
       cursor: pointer; }

       button:hover { opacity: 0.8; }

       #cancelbtn { width: auto;
         padding: 10px 18px;
         background-color: #B91818; }

         #btncontainer { padding: 20px; }

         span.psw { float: right;
           padding-top: 16px; }

           #signup { float: right; }

           #leftContainer { float:left;}

           #rightContainer { float:right;}

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
            <?php
if (isset($_SESSION['name'])) {?>

              <a style="float:right;" href="logout.php">Logout</a>
              <a style="float:right;" href="loginpage.php">Welcome<?php echo $_SESSION['name'] ?></a>
            <?php } else {?>
              <a style="float:right;" href="loginpage.php">Login / Signup</a>
            <?php }
?>
          </div>

          <center><h2><font color="#0E276A">Browse Jobs</font></h2></center>

          <form action="resultspage.php" method="POST">
            <div id="btncontainer">
              <br>
              <center>
               <div id="leftContainer">
                <input type="text" style = "width: 180%; padding: 8px" placeholder="Enter Skills" name="skills" required>
               </div>

               <div id="rightContainer">
                 <select name="skill_preference" style = "width: 100%; padding: 8px" placeholder="Preference">
                  <option value="" disabled selected hidden>Preference</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
            </center>

            <br><br>
            <h2></h2>

	  <!--<center>
	  <div id="leftContainer">
  	    <input type="text" style = "width: 180%; padding: 8px" placeholder="Enter Skills" name="skills2">
	  </div>

	  <div id="rightContainer">
	    <select name="preference" style = "width: 100%; padding: 8px" placeholder="Preference">
              <option value="" disabled selected hidden>Preference</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
	      <option value="4">4</option>
	      <option value="5">5</option>
	      <option value="6">6</option>
            </select>
          </div>
	  </center>

          <br><br>
          <h2></h2>

          <center>
	  <div id="leftContainer">
  	    <input type="text" style = "width: 180%; padding: 8px" placeholder="Enter Skills" name="skills3">
	  </div>

	  <div id="rightContainer">
	    <select name="preference" style = "width: 100%; padding: 8px" placeholder="Preference">
              <option value="" disabled selected hidden>Preference</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
	      <option value="4">4</option>
	      <option value="5">5</option>
	      <option value="6">6</option>
            </select>
          </div>
	  </center>

          <br><br>
          <h2></h2>-->


          <center>
           <div id="leftContainer">
             <input type="text" style = "width: 180%; padding: 8px" placeholder="Expected Salary" name="salary">
           </div>

           <div id="rightContainer">
             <select name="salary_preference" style = "width: 100%; padding: 8px" placeholder="Preference">
              <option value="" disabled selected hidden>Preference</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
        </center>

        <br><br>
        <h2></h2>

        <center>
          <div id="leftContainer">
           <select name="location" style = "width: 250%; padding: 8px" placeholder="Location">
            <option value="" disabled selected hidden>Location</option>
            <option value="johor">Johor</option>
            <option value="kedah">Kedah</option>
            <option value="kelantan">Kelantan</option>
            <option value="kuala lumpur">Kuala Lumpur</option>
            <option value="melaka">Melaka</option>
            <option value="negeri sembilan">Negeri Sembilan</option>
            <option value="pahang">Pahang</option>
            <option value="penang">Penang</option>
            <option value="perak">Perak</option>
            <option value="perlis">Perlis</option>
            <option value="putrajaya">Putrajaya</option>
            <option value="sabah">Sabah</option>
            <option value="sarawak">Sarawak</option>
            <option value="selangor">Selangor</option>
            <option value="terengganu">Terengganu</option>
          </select>
        </div>

        <div id="rightContainer">
         <select name="location_preference" style = "width: 100%; padding: 8px" placeholder="Preference">
          <option value="" disabled selected hidden>Preference</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </center>

    <br><br>
    <h2></h2>

    <center>
     <div id="leftContainer">
      <select name="experience" style = "width: 220%; padding: 8px" placeholder="Years of experience">
        <option value="" disabled selected hidden>Years of Experience</option>
        <option value="3">0 to 3 Years</option>
        <option value="5">3 to 5 Years</option>
        <option value="6">More than 5 Years</option>
      </select>
    </div>

    <div id="rightContainer">
     <select name="exp_preference" style = "width: 100%; padding: 8px" placeholder="Preference">
      <option value="" disabled selected hidden>Preference</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select>
  </div>
</center>

<br><br>
<h2></h2>

</div>

<center>
 <div>
   <input type="submit" value = "Search" style = "width: 35%; padding: 10px">
   <input type="reset" value = "Reset" style = "background-color: #C0392B; color: white; width: 35%; padding: 10px">
   <br><br>
 </div>
</center>

</form>
</div>
</body>
</html>