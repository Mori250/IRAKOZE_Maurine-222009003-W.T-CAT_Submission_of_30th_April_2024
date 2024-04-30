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
    <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF PURCHASES IN OUR SYSTEM</h4>
    <a href="purchase form.html" class="btn btn-primary" style="margin-top: 0px;">New Purchase</a>
    <a href="home.html" class="btn btn-secondary" style="margin-left: 20px;">Back Home</a>
    <table class="table table-bordered">
        <thead class="bg-warning">
        <tr>
            <th>purchase_id</th>
            <th>product_name</th>
            <th>quantity</th>
            <th>unit_price</th>
            <th>total_Price</th>
            <th>purchase_date</th>
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

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind the parameters
            $stmt = $connection->prepare("INSERT INTO purchase (product_name, quantity, unit_price, total_price, purchase_date) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("siiii", $productName, $quantity, $unitPrice, $totalPrice, $purchasedate);

            // Set parameters
            $productName = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $unitPrice = $_POST['unit_price'];
            $totalprice = $_POST['total_price'];
            $purchasedate = $_POST['purchase_date'];
            $totalPrice = $quantity * $unitPrice; // Calculating total price
            $productionDate = date("Y-m-d"); // Current date

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close the statement
            $stmt->close();
        }

        // SQL query to fetch data from the purchase table
        $sql = "SELECT * FROM purchase";
        $result = $connection->query($sql);

        // Check if there are any purchases
        if ($result && $result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['purchase_id'] . "</td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td>" . $row['unit_price'] . "</td>
                    <td>" . $row['total_price'] . "</td>
                    <td>" . $row['purchase_date'] . "</td>
                    <td>
                        <a href='edit_purchase.php?id={$row['purchase_id']}' class='btn btn-info btn-sm'>Edit</a>
                        <a href='delete_purchase.php?id={$row['purchase_id']}' class='btn btn-danger btn-sm'>Delete</a>
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
