<?php
include('dbconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM Farmers WHERE FarmerID = ?");
    $stmt->bind_param("i", $user_id);
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
        echo "User not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="FarmerID">FarmerID:</label>
        <input type="number" name="FarmerID" value="<?php echo isset($a) ? $a : ''; ?>" readonly>
        <br><br>
        <label for="FirstName">FirstName:</label>
        <input type="text" name="FirstName" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="LastName">LastName:</label>
        <input type="text" name="LastName" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="Phone">Phone:</label>
        <input type="number" name="Phone" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="email">email:</label>
        <input type="email" name="email" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($b) ? $b : ''; ?>">

        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this student record?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve FarmerID for deletion
    $FarmerID = $_POST['FarmerID'];

    // Prepare and execute DELETE statement to delete the farmes record
    $stmt = $connection->prepare("DELETE FROM Farmers WHERE FarmerID = ?");
    $stmt->bind_param("i", $FarmerID);

    if ($stmt->execute()) {
        // Redirect to sfarmers_table.php after successful deletion
        header('Location: farmers-table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}
?>