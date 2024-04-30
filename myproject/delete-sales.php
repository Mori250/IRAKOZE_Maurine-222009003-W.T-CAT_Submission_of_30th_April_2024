<?php
include('dbconnection.php');
// Check if user_id is set
if (isset($_REQUEST['id'])) {
    $user_id = $_REQUEST['id'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM Sales WHERE sales_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['sales_id'];
        $x = $row['product_name'];
        $z = $row['quantity'];
        $b = $row['unit_price']; 
        $c = $row['total_price'];
        $b = $row['sales_date'];
    } else {
        echo "User not found.";
    }
}

?>

<html>
<body>
    <form method="POST">
        <label for="sales_id">sales_id:</label>
        <input type="number" name="sales_id" value="<?php echo isset($a) ? $a : ''; ?>" readonly>
        <br><br>
        <label for="product_name">product_name:</label>
        <input type="text" name="product_name" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="quantity">quantity:</label>
        <input type="number" name="quantity" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="total_price">total_price:</label>
        <input type="number" name="total_price" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="unit_price">unit_price:</label>
        <input type="number" name="unit_price" value="<?php echo isset($b) ? $b : ''; ?>">

        <label for="sales_date">sales_date:</label>
        <input type="date" name="sales_date" value="<?php echo isset($b) ? $b : ''; ?>">

        <input type="submit" name="del" value="Delete" onclick="return confirm('Are you sure you want to delete this student record?')">
    </form>
</body>
</html>

<?php
if (isset($_POST['del'])) {
    // Retrieve sales_id for deletion
    $sales_id = $_POST['sales_id'];

    // Prepare and execute DELETE statement to delete the farmes record
    $stmt = $connection->prepare("DELETE FROM Sales WHERE sales_id = ?");
    $stmt->bind_param("i", $sales_id);

    if ($stmt->execute()) {
        // Redirect to sales-table.php after successful deletion
        header('Location: sales-table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}
?>