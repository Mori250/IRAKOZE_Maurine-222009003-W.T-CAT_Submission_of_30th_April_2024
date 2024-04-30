<?php 
include "dbconnection.php";

$manager_id = ""; // Initialize variables to avoid undefined variable errors
$first_name = "";
$last_name = "";
$email_adress = "";
$telephone = "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read the row of the selected product from the database
    if(isset($_GET['manager_id'])) {
        $manager_id = $_GET['manager_id'];
        $sql = "SELECT * FROM manager WHERE manager_id=$manager_id";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $manager_id = $row["manager_id"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email_adress = $row["email_adress"];
            $telephone = $row["telephone"];
        } else {
            header("location: /myproject/manager table.php");
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $manager_id = $_POST["manager_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email_adress = $_POST["email_adress"];
    $telephone = $_POST["telephone"];
    if (empty($manager_id) || empty($first_name) || empty($last_name) || empty($email_adress) || empty($telephone)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE manager SET first_name='$first_name', last_name='$last_name', email_adress='$email_adress', telephone='$telephone' WHERE manager_id=$manager_id";
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: manager table.php");
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
                <label> manager_id</label><br>
                <input type="number" name="manager_id" class="input" value="<?php echo $manager_id; ?>"><br>      
                <label>first_name</label><br>
                <input type="text" name="first_name" class="input" value="<?php echo $first_name; ?>"><br>
                <label>last_name</label><br>
                <input type="text" name="last_name" class="input" value="<?php echo $last_name; ?>"><br> 
                <label>email_adress</label><br>
                <input type="text" name="email_adress" class="input" value="<?php echo $email_adress; ?>"><br>
                <label>telephone</label><br>
                <input type="number" name="telephone" class="input" value="<?php echo $telephone; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>