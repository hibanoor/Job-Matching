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
echo "Connected successfully";

$email    = $_POST['uname'];
$password = $_POST['psw'];

$sql     = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
$result  = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$details = $result->fetch_assoc();
$count   = mysqli_num_rows($result);

if ($count == 1) {

    $_SESSION['name']  = $details['name'];
    $_SESSION['email'] = $details['email'];

/*    echo '<pre>';
print_r($_SESSION);
die('stop here');*/
    header('Location: ' . 'index.php?login=success');
} else {
//3.1.3 If the login credentials doesn't match, this will be shown with an error message.
    /*echo  "Invalid Login Credentials.";*/
    header('Location: ' . 'loginpage.php?login=invalid');
}

/*if ($conn->query($sql) === TRUE) {
echo "Login Successful";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
 */
$conn->close();
?>
