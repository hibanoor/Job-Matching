<!DOCTYPE html>
<html>
<head>
  <title>Job Record</title>   
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

       <?php 
       $servername = "localhost";
       $username = "root";
       $password = "";
       $database = "ippi_project";
// Create connection 
       $conn = new mysqli($servername, $username, $password, $database);

// Check connection
       if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      /* echo "Connected successfully";*/

      $sql = "SELECT * FROM jobs ";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      
      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }
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
              <a style="float:right;" href="loginpage.php">Welcome<?php echo $_SESSION['name'] ?></a>
            <?php }else{?>
              <a style="float:right;" href="loginpage.php">Login / Signup</a>
            <?php }
            ?>
          </div>

          <center><h2><font color="#0E276A">Browse Jobs</font></h2></center>
          <div id="btncontainer">
            <center>
             <div id="leftContainer">
              <table style="width:100%" class="table" cellspacing="20"  border="1">
                <tr>
                  <th>Title </th>
                  <th>Skills</th> 
                  <th>Locations</th>
                </tr>
                <tbody>
                  <?php 
                  foreach ($data as $key => $value) {?>
                   <tr>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['skills'] ?></td> 
                    <td><?php echo $value['location'] ?></td>
                  </tr>
                <?php   }
                ?>

              </tbody>
            </table>
          </div>
        </center>
      </div>

      <br><br>
      <h2></h2>
    </div>
  </body>
  </html>