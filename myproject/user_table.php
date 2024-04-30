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
    <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF USERS OF OUR SYSTEM</h4>
    <a href="index.php" class="btn btn-secondary" style="margin-left: 1000px;">Back Login</a>
    <table class="table table-bordered">
        <thead class="bg-warning">
        <tr>
            <th>user_id</th>
            <th>names</th>
            <th>username</th>
            <th>password</th>
            <th>email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Establish database connection
        include('dbconnection.php');
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind the parameters
            $stmt = $connection->prepare("INSERT INTO user (user_id, names, username, password, email) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issis", $user_id, $names, $username, $password, $email);

            // Set parameters
            $user_id = $_POST['user_id'];
            $names = $_POST['names'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            // Execute the statement
            if ($stmt->execute()) {
                echo "New record has been added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            // Close the statement
            $stmt->close();
        }

        // SQL query to fetch data from the user table
        $sql = "SELECT * FROM user";
        $result = $connection->query($sql);

        // Check if there are any users
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row['user_id'] . "</td>
                    <td>" . $row['names'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td><a style='padding:4px' href='delete_user.php?user_id={$row['user_id']}'>Delete</a></td>
                    <td><a style='padding:4px' href='edit_user.php?user_id={$row['user_id']}'>Edit</a></td> 
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
