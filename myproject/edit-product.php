<?php
// Connection details
include('dbconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM Products WHERE ProductID = ?");
    $stmt->bind_param("i", $ProductID);
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
    
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="ProductID">ProductID:</label>
        <input type="number" name="ProductID" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="Price">Price:</label>
        <input type="text" name="Price" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="Quantity">Quantity:</label>
        <input type="text" name="Quantity" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <label for="UploadDate">UploadDate:</label>
        <input type="number" name="UploadDate" value="<?php echo isset($c) ? $c : ''; ?>">

        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
if (isset($_POST['up'])) {
    // Retrieve updated values from students
   $ProductID = $_POST['ProductID'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];
    $UploadDate = $_POST['UploadDate'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE product SET Name=?, Price=?, Quantity=?, UploadDate=? WHERE ProductID=?");

    $stmt->bind_param("ssssi",$ProductID, $Name, $Price, $Quantity, $UploadDate, ); // Corrected binding parameters

    if ($stmt->execute()) {
        // Redirect to studenttable.php after successful update
        header('Location: product-table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>