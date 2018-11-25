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
/*echo "Connected successfully";*/

$name     = (isset($_POST['name']) && !empty($_POST['name'])) ? $_POST['name'] : null;
$email    = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
$password = (isset($_POST['psw']) && !empty($_POST['psw'])) ? $_POST['psw'] : null;

/*check Email*/
if ($email === null) {
    header('Location: ' . 'signup_page.php?email=nomail');
} elseif ($password === null) {
    header('Location: ' . 'signup_page.php?email=nopass');
}
$sql    = "SELECT email FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$count  = mysqli_num_rows($result);
/*echo '<pre>';
print_r($count);*/
if ($count > 0) {
    header('Location: ' . 'signup_page.php?email=true');
} else {

    $address    = (isset($_POST['address']) && !empty($_POST['address'])) ? $_POST['address'] : null;
    $skills     = (isset($_POST['skills']) && !empty($_POST['skills'])) ? $_POST['skills'] : 'null';
    $experience = (isset($_POST['experience']) && !empty($_POST['experience'])) ? $_POST['experience'] : 0;
    $employer   = (isset($_POST['employer']) && !empty($_POST['employer'])) ? false : true;

    $sql = "INSERT INTO users(`name`, `email`, `password`, `address`, `skills`, `experience`, `employer`)
	VALUES ('$name', '$email', '$password', '$address', '$skills', '$experience', '$employer')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ' . 'loginpage.php');

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
