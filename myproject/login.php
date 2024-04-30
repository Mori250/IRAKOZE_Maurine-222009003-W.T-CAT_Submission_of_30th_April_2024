<?php
session_start();
include('dbconnection.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Perform authentication using the 'user' table
    $sql = "SELECT user_id FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Error: " . $conn->error;
        exit;
    }

    // Check if any row was returned
    if ($result->num_rows == 1) {
        // Fetch the ID from the query result
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        
        // Store user ID and email in the session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        
        // Redirect to common home page
        header("Location: home.html");
        exit();
    } else {
        echo "Invalid email or password";
        exit;
    }
}

$conn->close();
?>
