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
    <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF AGRONOMISTS OF OUR SYSTEM</h4>
    <a href="agronomist-form.html" class="btn btn-primary" style="margin-top: 0px;">New Agronomist</a>
    <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
    <table class="table table-bordered">
        <thead class="bg-warning">
        <tr>
            <th>Agronomist ID</th>
            <th>Agronomist Names</th>
            <th>Agronomist_tel</th>
            <th>Location</th>
            <th>Degree</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Establish database connection
        include('dbconnection.php');
        // Check for connection errors
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind the parameters
            $stmt = $connection->prepare("INSERT INTO agronomist (agronomist_id, agronomist_names, agronomist_tel, location, degree) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isiss",$agronomist_id, $agronomist_names, $agronomist_tel, $location, $degree);
            // Set parameters

            $agronomist_id = $_POST['agronomist_id'];
            $agronomist_names = $_POST['agronomist_names'];
            $agronomist_tel = $_POST['agronomist_tel'];
            $location = $_POST['location'];
            $degree = $_POST['degree'];

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close the statement
            $stmt->close();
        }

        // SQL query to fetch data from the agronomist table (corrected table name to lowercase)
        $sql = "SELECT * FROM agronomist";
        $result = $connection->query($sql);

        // Check if there are any agronomists
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['agronomist_id'] . "</td>
                    <td>" . $row['agronomist_names'] . "</td>
                    <td>" . $row['agronomist_tel'] . "</td>
                    <td>" . $row['location'] . "</td>
                    <td>" . $row['degree'] . "</td>
                    <td><a style='padding:4px' href='delete_agronomist.php?agronomist_id={$row['agronomist_id']}'>Delete</a></td>
                    <td><a style='padding:4px' href='edit_agronomist.php?agronomist_id={$row['agronomist_id']}'>Edit</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
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
