<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>   
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

           img { width:100%;}
         </style>
       </head>

       <?php
       session_start();
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
      /*echo "Connected successfully";*/


/*  echo '<pre>';
print_r($_POST);
die();*/


if(isset($_POST['skills'])){
  $skills=$_POST['skills'];
  $salary=$_POST['salary'];
  if(!empty($_POST['location'])){
    $location=$_POST['location'];
  }else{
    $location='';
  }
  
  


/* echo "SELECT * FROM jobs WHERE (job_title LIKE '%$skills%' OR requirements LIKE '%$skills%' OR job_description LIKE '%$skills%') AND (salary LIKE '%$salary%' AND locations LIKE '%$location%')";
 die(); */

 /* $sql = "SELECT * FROM jobs WHERE skills = '$skills' OR skills2 = '$skills2' OR skills3 = '$skills3' AND salary='$salary' AND location='$location' AND experience='$experience'";   */ 

 /*$sql = "SELECT * FROM jobs WHERE (skills LIKE '%$skills%' OR skills2 LIKE '%$skills%' OR skills3 LIKE '%$skills%') AND (salary LIKE '%$salary%' AND location LIKE '%$location%' AND experience LIKE '%$experience%')";*/

 $sql = "SELECT * FROM jobs WHERE (job_title LIKE '%$skills%' OR requirements LIKE '%$skills%' OR job_description LIKE '%$skills%') AND (salary LIKE '%$salary%' AND locations LIKE '%$location%')";   
 $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 $count = mysqli_num_rows($result);

 if ($count >= 0){
   $post = array();
   while($row = mysqli_fetch_assoc($result))
   {
    $data[] = $row;
  }
}
}




$conn->close();
?>

<body style="background-color:#FFFFFF; background-repeat: round">
  <div id="container">
    <div id="menu">
      <a href="index.php">Home</a>
      <a href="#job options">Job Options</a>
      <a href="#requirements">Requirements</a>
      <a href="recommendation.php">Recommendation</a>
      <a href="#prediction">Prediction</a>
      <a style="float:right;" href="loginpage.php">Login / Sign up</a>
    </div>

    <center><h2><font color="#0E276A">Recommended Jobs</font></h2></center>

    <center>
     <?php 

     if(!empty($data)){?>
       <table style="width:100%; margin-top: 40px; border:3px solid #f1f1f1" class="table" cellspacing="1" cellspacing="20" border="1">
        <thead>
          <tr>
            <th width="25%">Title</th>
            <th width="25%">Description</th>
            <th width="25%">Requirements</th>
            <th width="25%">Salary</th>
            <th width="25%">Location</th>
          </tr>
        </thead>

        <tbody>

          <?php 
          foreach ($data as $key => $d) {?>
            <tr>
             <td> <?php echo $d['job_title'] ?> </td>
             <td> <?php echo $d['job_description'] ?> </td>
             <td> <?php echo $d['requirements']?> </td>
             <td> <?php echo $d['Salary']?> </td>
             <td> <?php echo $d['locations']?> </td>
           </tr> 
         <?php   }
         ?>



       </tbody>
     </table>

     <?php 
   }else{
     ?>
     <table style="width:100%; margin-top: 40px; border:3px solid #f1f1f1" class="table" cellspacing="1" cellspacing="20" border="1">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Requirements</th> 
          <th>Location</th>
          <th>Salary</th>
        </tr>
      </thead>

      <tbody>
        <tr><td></td>
         <td></td>
         <td style="text-align: center;">Record Not Found</td>
         <td></td></tr>
       </tbody>
     </table>

     <?php 
   }
   ?>
 </center>
</div>
</body>
</html>