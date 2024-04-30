<?php
include('dbconnection.php');
// Check if production_id is set
if(isset($_GET['production_id'])) {
    $production_id = $_GET['production_id'];

    // Prepare the DELETE statement
    $stmt = $connection->prepare("DELETE FROM production WHERE production_id=?");
    $stmt->bind_param("i", $production_id);

    // JavaScript for confirmation dialog
    echo "<script>
            function confirmDelete() {
                return confirm('Are you sure you want to delete this record?');
            }
          </script>";

    // Execute the DELETE statement if user confirms
    if(isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
        if ($stmt->execute()) {
            echo "Record deleted successfully.";
            // Redirect the user to the table page
            header("Location: production-table.php");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "production_id is not set.";
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
</head>
<body>
    <?php
    // Display a message indicating which record will be deleted
   
    ?>

    <form method="post" onsubmit="return confirmDelete();">
        <input type="hidden" name="production_id" value="<?php echo $production_id; ?>">
        <input type="hidden" name="confirm_delete" value="yes"> <!-- This will be used to confirm deletion -->
        <input type="submit" value="Delete">
    </form>

    <a href="production-table.php" class="btn btn-primary" style="margin-top: 0px;">Back to production</a>
</body>
</html>