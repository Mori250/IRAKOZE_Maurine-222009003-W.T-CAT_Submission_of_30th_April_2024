<?php
include('dbconnection.php');
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the BuyerID is set in the URL
if(isset($_GET['BuyerID'])) {
    $BuyerID = $_GET['BuyerID'];

    // Prepare and bind the delete statement
    $stmt = $connection->prepare("DELETE FROM buyers WHERE BuyerID = ?");
    $stmt->bind_param("i", $BuyerID); // "i" indicates the type of the parameter (integer)

    // Execute the delete statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
