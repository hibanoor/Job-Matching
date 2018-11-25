<?php require_once 'functions.php'; ?>
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
           th,
td {

  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ccc; }
th:first-child,
td:first-child {
  padding-left: 0; }
th:last-child,
td:last-child {
padding-right: 0; }
td{
  vertical-align: top;
}
         </style>
       </head>

       <?php
session_start();
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "ippi_project";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type = (isset($_POST['type'])) ? $_POST['type'] : null;
$type = str_replace(' ', '', $type);
$type = intval($type);

$type = ($type === 1) ? 'employer' : 'employee';


if (isset($_POST['skills'])) {
    $skills = $_POST['skills'];
    $salary = (isset($_POST['salary'])) ? $_POST['salary'] : null;
    if (!empty($_POST['location'])) {
        $location = $_POST['location'];
    } else {
        $location = '';
    }
    $experience = (isset($_POST['experience'])) ? intval($_POST['experience']) : 0;

    $preferences    = array();
    $preferences[0] = (isset($_POST['skill_preference'])) ? intval($_POST['skill_preference']) : 0;
    $preferences[1] = (isset($_POST['exp_preference'])) ? intval($_POST['exp_preference']) : 0;
    $preferences[2] = (isset($_POST['location_preference'])) ? intval($_POST['location_preference']) : 0;
    $preferences[3] = (isset($_POST['salary_preference'])) ? intval($_POST['salary_preference']) : 0;

    $order = array();
    for ($i = count($preferences) - 1; $i >= 0; $i--) {
        $max_index = array_keys($preferences, max($preferences));
        $var       = $max_index[0];
        $order[]   = $var;
        unset($preferences[$var]);
    }
    

/* echo "SELECT * FROM jobs WHERE (job_title LIKE '%$skills%' OR requirements LIKE '%$skills%' OR job_description LIKE '%$skills%') AND (salary LIKE '%$salary%' AND locations LIKE '%$location%')";
die(); */

    /* $sql = "SELECT * FROM jobs WHERE skills = '$skills' OR skills2 = '$skills2' OR skills3 = '$skills3' AND salary='$salary' AND location='$location' AND experience='$experience'";   */

    /*$sql = "SELECT * FROM jobs WHERE (skills LIKE '%$skills%' OR skills2 LIKE '%$skills%' OR skills3 LIKE '%$skills%') AND (salary LIKE '%$salary%' AND location LIKE '%$location%' AND experience LIKE '%$experience%')";*/

    $sql = "SELECT * FROM ";

    $sql .= (!strcmp($type, "employee")) ?
    "jobs WHERE (job_title LIKE '%$skills%' OR /*requirements LIKE '%$skills%' OR job_*/ description LIKE '%$skills%') "
    : "users where skills LIKE '%$skills%' ";
    $sql .= ((!strcmp($type, "employer")) && $experience !== 0) ? "AND experience = $experience" : "";
    
    $result     = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count      = mysqli_num_rows($result);
    $city_found = false;
    $data       = array();
    if ($count >= 0) {
        $index = -1;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        foreach ($order as $ind) {
            if ($ind === 1) {
                if (!empty($salary) && $salary !== null) {
                    $data = find_by_salary($data, $salary);
                }

            } elseif ($ind === 2) {
                if (!empty($location)) {
                    $data = find_by_location($data, $location);
                }

            } elseif ($ind === 3) {
                if ($experience !== 0) {
                    find_by_exp($data, $experience);
                }
            } elseif ($ind === 0) {
                ;
            }

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
if (!empty($data)) {

    ?>
       <table style="width:100%; margin-top: 40px;  class="table" cellspacing="1" cellspacing="20" >
        <thead>
          <tr>



<?php

if (!strcmp($type, "employee")) {
        echo '
                <th width="25%">Title</th>
                <th width="25%">Description</th>
                <th width="25%">Salary</th>
                <th width="25%">Location</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $key => $d) {
            echo "<tr>
             <td> {$d['job_title']}</td>
             <td> {$d['description']} </td>
             <td> ";
            echo ($d['salary'] !== 'null') ? $d['salary'] : "Not Specified";
            echo "</td>
             <td> {$d['location']} </td>
           </tr>";
        }
    } else if (!strcmp($type, "employer")) {
        echo '
                <th width="25%">Name</th>
                <th width="25%">Email</th>
                <th width="25%">Skills</th>
                <th width="25%">Address</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($data as $key => $d) {
            echo "<tr>
             <td> {$d['name']}</td>
             <td> {$d['email']} </td>
             <td> {$d['skills']} </td>
             <td> {$d['address']} </td>
           </tr>";
        }
    }
    
    ?>


       </tbody>
     </table>

     <?php
} else {
    ?>
     <table style="width:100%; margin-top: 40px;" class="table" cellspacing="1" cellspacing="20" >
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
