<?php
include "dbconnection.php";

if (isset($_GET["manager_id"])) {
    $manager_id = $connection->real_escape_string($_GET["manager_id"]);

    // JavaScript validation
    echo '<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "delete_manager.php?manager_id='.$manager_id.'";
        }
    }
    </script>';

    // Prepare DELETE statement
    $sql = "DELETE FROM manager WHERE manager_id = $manager_id";

    // Execute DELETE statement
    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
         header("Location: manager table.php");
    } else {
        echo "Error deleting record: " . $connection->error;
    }
}

$connection->close();
?>
