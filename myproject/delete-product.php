<?php
include('dbconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['ProductID'];
        $x = $row['Name'];
        $z = $row['Price'];
        $b = $row['Quantity']; 
        $c = $row['UploadDate'];
    } else {
        echo "User not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="ProductID">ProductID:</label>
        <input type="number" name="ProductID" value="<?php echo isset($a) ? $a : ''; ?>" readonly>
        <br><br>
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="Price">Price:</label>
        <input type="number" name="Price" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="UploadDate">UploadDate:</label>
        <input type="date" name="UploadDate" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="Quantity">Quantity:</label>
        <input type="number" name="Address" Quantity="<?php echo isset($b) ? $b : ''; ?>">

        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this product record?')">
    </form>
</body>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve ProductID for deletion
    $ProductID = $_POST['ProductID'];

    // Prepare and execute DELETE statement to delete the farmes record
    $stmt = $connection->prepare("DELETE FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);

    if ($stmt->execute()) {
        // Redirect to sales-table.php after successful deletion
        header('Location: products-table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}
?>