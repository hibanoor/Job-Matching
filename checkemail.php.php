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
echo "Connected successfully";
echo '<pre>';
print_r($_POST['email']);
echo "SELECT email FROM users WHERE email = ".$_POST['email'];
$sql = "SELECT email FROM users WHERE email = ".$_POST['email'];
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$details=$result->fetch_assoc();
$count = mysqli_num_rows($result);
echo '<pre>';
print_r($result);
die();
$email = $result->fetch_assoc();


die();

if (mysqli_num_rows > 0) {
	echo "exist";
}else echo 'notexist';
?>