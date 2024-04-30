<?php
// Connection details
include('dbconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM farmers WHERE FarmerID = ?");
    $stmt->bind_param("i", $FarmerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['FarmerID'];
        $x = $row['FirstName'];
        $z = $row['LastName'];
        $b = $row['Email']; 
        $c = $row['Phone'];
        $b = $row['Address'];
    } else {
    
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="FarmerID">FarmerID:</label>
        <input type="number" name="FarmerID" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="FirstName">FirstName:</label>
        <input type="text" name="FirstName" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="LastName">LastName:</label>
        <input type="text" name="LastName" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="Email">Email:</label>
        <input type="text" name="Email" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="Phone">Phone:</label>
        <input type="number" name="Phone" value="<?php echo isset($c) ? $c : ''; ?>">

        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($c) ? $c : ''; ?>">

        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from students
   $FarmerID = $_POST['FarmerID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $address = $_POST['Address'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE farmers SET FirstName=?, LastName=?, Email=?, Phone=?, Address=? WHERE FarmerID=?");

    $stmt->bind_param("sssssi",$FarmerID, $FirstName, $LastName, $Email, $Phone, $Address, ); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to studenttable.php after successful update
        header('Location: farmers-table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>