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

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['psw'];

/*check Email*/

$sql = "SELECT email FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
/*echo '<pre>';
print_r($count);*/
if($count > 0){
	header('Location: '.'http://127.0.0.1/edsa-IPPI/hiba/signup_page.php?email=true');
}else{

	$sql = "INSERT INTO users(`name`, `email`, `password`, `address`, `skills`, `experience`) 
	VALUES ('$name', '$email', '$password', '$address', '$skills', '$experience')";


	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location: '.'http://127.0.0.1/edsa-IPPI/hiba/loginpage.php');

	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}



$conn->close();
?>
