<?php 
include "dbconnection.php";

$user_id = ""; // Initialize variables to avoid undefined variable errors
$names = "";
$username = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read the row of the selected product from the database
    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM user WHERE user_id=$user_id";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row["user_id"];
            $names = $row["names"];
            $username = $row["username"];
            $password = $row["password"];
        } else {
            header("location: /myproject/user_table.php");
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST["user_id"];
    $names = $_POST["names"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($user_id) || empty($names) || empty($username) || empty($password)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE user SET names='$names', username='$username', password='$password' WHERE user_id=$user_id";
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /myproject/user_table.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farm Management System</title>
    <style>
        h2{
            font-family: Castellar;
            color: darkblue;
        }
        label{
            font-family: elephant;
            font-size: 20px;
        }
        .sb{
            font-family: Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }

        .input{
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    </style>
</head>
<body>
    <center>
        <h2>FARM MANAGEMENT SYSTEM</h2>
        <h3 style="color:green;">UPDATE USER HERE</h3>
        <section class="forms">
            <form method="POST">
                <label>User ID</label><br>
                <input type="number" name="user_id" class="input" value="<?php echo $user_id; ?>"><br>      
                <label>Names</label><br>
                <input type="text" name="names" class="input" value="<?php echo $names; ?>"><br>
                <label>Username</label><br>
                <input type="text" name="username" class="input" value="<?php echo $username; ?>"><br> 
                <label>Password</label><br>
                <input type="password" name="password" class="input" value="<?php echo $password; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>
