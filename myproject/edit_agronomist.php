<?php 
include "dbconnection.php";
$agronomist_id ="";
$agronomist_names = ""; 
$agronomist_tel = "";
$location = "";
$degree = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read the row of the selected product from the database
    if(isset($_GET['agronomist_id'])) {
        $agronomist_id = $_GET['agronomist_id'];
        $sql = "SELECT * FROM agronomist WHERE agronomist_id=$agronomist_id";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $agronomist_id = $row["agronomist_id"];
            $agronomist_names = $row["agronomist_names"];
            $agronomist_tel = $row["agronomist_tel"];
            $location = $row["location"];
            $degree = $row["degree"];
        } else {
            header("location: /myproject/agronomist.php");
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agronomist_id = $_POST["agronomist_id"];
    $agronomist_names = $_POST["agronomist_names"];
    $agronomist_tel = $_POST["agronomist_tel"];
    $location = $_POST["location"];
    $degree = $_POST["degree"];
    if (empty($agronomist_id) || empty($agronomist_names) || empty($agronomist_tel) || empty($degree) || empty($location)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE agronomist SET agronomist_id='$agronomist_id', agronomist_names='$agronomist_names', agronomist_tel='$agrononomist_tel', location='$location', degree='$degree' WHERE agronomist_id=$agronomist_id";
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: /myproject/agronomist.php");
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
        <h3 style="color:green;">UPDATE AGRONOMIST HERE</h3>
        <section class="forms">
            <form method="POST">
            <label>agronomist_id</label><br>
                <input type="text" name="agronomist_id" class="input" value="<?php echo $agronomist_id; ?>"><br>
                <label>agronomist_names</label><br>
                <input type="text" name="agronomist_names" class="input" value="<?php echo $agronomist_names; ?>"><br>      
                <label>agronomist_tel</label><br>
                <input type="number" name="agronomist_tel" class="input" value="<?php echo $agronomist_tel; ?>"><br>
                <label>location</label><br>
                <input type="text" name="location" class="input" value="<?php echo $location; ?>"><br> 
                <label>degree</label><br>
                <input type="text" name="degree" class="input" value="<?php echo $degree; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>