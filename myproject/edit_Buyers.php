<?php 
include "dbconnection.php";
$BuyerID= ""; // Initialize variables to avoid undefined variable errors
$FirstName= "";
$LastName= "";
$Email= "";
$Phone= "";
$Address= "";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Read the row of the selected product from the database
    if(isset($_GET['BuyerID'])) {
        $BuyerID= $_GET['BuyerID'];
        $sql = "SELECT * FROM buyers WHERE BuyerID=$BuyerID";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $BuyerID= $row["BuyerID"];
            $FirstName= $row["FirstName"];
            $LastName= $row["LastName"];
            $Email= $row["Email"];
            $Phone= $row["Phone"];
            $Address= $row["Address"];
        } else {
            header("location: /myproject/buyers table.php");
            exit;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $FirstName= $_POST["FirstName"];
    $LastName= $_POST["LastName"];
    $Email= $_POST["Email"];
    $Phone= $_POST["Phone"];
    $Address= $_POST["Address"];
    if (empty($BuyerID) || empty($FirstName) || empty($LastName) || empty($Email) || empty($Phone) ||empty($Address)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE buyers SET FirstName='$FirstName', LastName='$LastName', Email='$Email', Phone='$Phone', WHERE BuyerID=$BuyerID";
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location: Buyers table.php");
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
                <label>FirstName</label><br>
                <input type="text" name="FirstName" class="input" value="<?php echo $FirstName; ?>"><br>
                <label>LastName</label><br>
                <input type="text" name="LastName" class="input" value="<?php echo $LastName; ?>"><br> 
                <label>Email</label><br>
                <input type="text" name="Email" class="input" value="<?php echo $Email; ?>"><br>
                <label>Phone</label><br>
                <input type="number" name="Phone" class="input" value="<?php echo $Phone; ?>"><br>
                <label>Address</label><br>
                <input type="text" name="Address" class="input" value="<?php echo $Address; ?>"><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
    </footer>
</body>
</html>