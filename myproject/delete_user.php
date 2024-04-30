<?php
include('dbconnection.php');
// Check if agronomist_id is set
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Prepare the DELETE statement
    $stmt = $connection->prepare("DELETE FROM User WHERE user_id=?");
    $stmt->bind_param("i", $user_id);

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
            header("Location: user_table.php");
            exit(); // Ensure that subsequent code is not executed after redirection
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "user_id is not set.";
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
    echo "<p>Deleting record with user ID: $user_id</p>";
    ?>

    <form method="post" onsubmit="return confirmDelete();">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="confirm_delete" value="yes"> <!-- This will be used to confirm deletion -->
        <input type="submit" value="Delete">
    </form>

    <a href="user_table.php" class="btn btn-primary" style="margin-top: 0px;">Back to User</a>
</body>
</html>
