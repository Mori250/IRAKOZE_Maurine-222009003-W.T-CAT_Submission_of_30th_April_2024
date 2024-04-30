<?php
include('db_connection.php');
if(isset($_GET['query'])) {
    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'Users' => "SELECT user_id FROM Users WHERE user_id LIKE '%$searchTerm%'"
        'Agronomist' => "SELECT Agronomist_Id FROM Agronomist WHERE Agronomist_Id LIKE '%$searchTerm%'",
        'Manager' => "SELECT manager_id FROM Manager WHERE manager_id LIKE '%$searchTerm%'",
        'Production' => "SELECT production_name FROM Production WHERE production_name LIKE '%$searchTerm%'",
        'Products' => "SELECT productID FROM Products WHERE ProductID LIKE '%$searchTerm%'",
        'Purchase' => "SELECT purchase_id FROM Purchase WHERE purchase_id LIKE '%$searchTerm%'",
        'Sales' => "SELECT sales_Id FROM Sales WHERE sales_Id LIKE '%$searchTerm%'",
        'Buyers' => "SELECT BuyerID FROM Buyers WHERE BuyerID LIKE '%$searchTerm%'"
    ];  'Farmers' => "SELECT FarmerID FROM Farmers WHERE farmerID LIKE '%$searchTerm%'"

    // Output search results
    echo "<style>
                h2 {
                    color: blue;
                    text-decoration: underline;
                }
                h3 {
                    color: green;
                }
                p {
                    color: black;
                }
          </style>";
    echo "<h2>Search Results:</h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>


