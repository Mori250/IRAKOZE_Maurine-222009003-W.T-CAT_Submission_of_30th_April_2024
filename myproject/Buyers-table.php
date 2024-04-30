<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Farm Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form class="d-flex" role="search" action="search.php">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
    <button class="btn btn-outline-success search-button" type="submit">Search</button>
</form>
<div class="container">
    <h2 style="text-align: center; font-family: century; font-weight: bold;">FARM MANAGEMENT SYSTEM</h2>
    <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF BUYERS OF OUR SYSTEM</h4>
    <a href="buyers form.html" class="btn btn-primary" style="margin-top: 0px;">New Buyer</a>
    <a href="home.html" class="btn btn-secondary" style="margin-left: 20px;">Back Home</a>
    <table class="table table-bordered">
        <thead class="bg-warning">
        <tr>
            <th>Buyer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Establish database connection
        include('dbconnection.php');

        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $BuyerID = $_POST['BuyerID'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];

    // Prepare and bind the update statement
    $stmt = $connection->prepare("UPDATE buyers SET FirstName=?, LastName=?, Email=?, Phone=?, Address=? WHERE BuyerID=?");
    $stmt->bind_param("sssssi", $FirstName, $LastName, $Email, $Phone, $Address, $BuyerID); // "sssssi" indicates the type of the parameters (strings followed by an integer)


            // Execute the statement
            if ($stmt->execute()) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close the statement
            $stmt->close();
        }

        // SQL query to fetch data from the buyer table
        $sql = "SELECT * FROM buyers";
        $result = $connection->query($sql);

        // Check if there are any buyers
        if ($result && $result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['BuyerID'] . "</td>
                    <td>" . $row['FirstName'] . "</td>
                    <td>" . $row['LastName'] . "</td>
                    <td>" . $row['Email'] . "</td>
                    <td>" . $row['Phone'] . "</td>
                    <td>" . $row['Address'] . "</td>
                    <td>
                        <a href='edit_Buyers.php?BuyerID={$row['BuyerID']}' class='btn btn-info btn-sm'>Edit</a>
                        <a href='delete-Buyers.php?BuyerID={$row['BuyerID']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
        </tbody>
    </table>
</div>

<footer><!-- Footer section -->
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
</footer><!-- Footer section -->

</body>
</html>
