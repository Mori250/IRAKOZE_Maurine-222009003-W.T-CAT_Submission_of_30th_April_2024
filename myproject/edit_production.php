<?php
include('dbconnection.php');
// Creating connection
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if production_id is set
if (isset($_REQUEST['production_id'])) {
  $production_id = $_REQUEST['production_id'];

  // Prepare statement with parameterized query to prevent SQL injection (security improvement)
  $stmt = $connection->prepare("SELECT * FROM production WHERE production_id=?");
  $stmt->bind_param("i", $production_id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $x = $row['production_id'];
    $y = $row['product_name'];
    $z = $row['quantity'];
    $w = $row['unit_price'];
    $s = $row['total_price'];
    $r = $row['production_date'];
  } else {
    echo "production not found.";
  }

  $stmt->close(); // Close the statement after use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update production</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update production form -->
    <h2><u>Update Form of production</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">
    <label for="production_id">production_id:</label>
    <input type="number" name="production_id" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>
    <label for="product_name">product_name:</label>
    <input type="text" name="product_name" value="<?php echo isset($y) ? $y : ''; ?>">
    <br><br>

    <label for="quantity">quantity:</label>
    <input type="number" name="quantity" value="<?php echo isset($z) ? $z : ''; ?>">
    <br><br>

    <label for="unit_price">unit_price:</label>
    <input type="number" name="unit_price" value="<?php echo isset($w) ? $w : ''; ?>">
    <br><br>

    <label for="total_price">total_price:</label>
    <input type="number" name="total_price" value="<?php echo isset($s) ? $s : ''; ?>">
    <br><br>

    <label for="production_date">production_date:</label>
    <input type="date" name="production_date" value="<?php echo isset($r) ? $r : ''; ?>">
    <br><br>

    <input type="hidden" name="production_id" value="<?php echo isset($production_id) ? $production_id : ''; ?>">
    <input type="submit" name="up" value="Update">

  </form>
   <a href="usertable.php" class="btn btn-primary" style="margin-top: 0px;">Back to production</a>
</body>
</html>

<?php
if (isset($_POST['up'])) {
  // Retrieve updated values from form
  $product_name = $_POST['product_name'];
  $quantity = $_POST['quantity'];
  $unit_price = $_POST['unit_price'];
  $total_price = $_POST['total_price'];
  $production_date = $_POST['production_date'];

  // Update the production in the database (prepared statement again for security)
  $stmt = $connection->prepare("UPDATE production SET product_name=?, quantity=?, unit_price=?, total_price=?, production_date=?, production_id=? WHERE production_id=?");
  $stmt->bind_param("siiidi", $product_name, $quantity, $unit_price, $total_price, $production_date, $production_id);
  $stmt->execute();

  // Redirect to production-table.php
  header('Location: production_table.php');
  exit(); // Ensure no other content is sent after redirection
}

// Close the connection (important to close after use)
$connection->close();
?>