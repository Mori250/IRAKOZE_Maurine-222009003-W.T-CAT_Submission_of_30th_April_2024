<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
     /* Styles for the container */
.container {
    width: 400px;
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 50px; /* Adjust as needed */
}

/* Styles for the form header */
.form-header {
    text-align: center;
    margin-bottom: 20px;
}

/* Styles for the form fields */
.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styles for the buttons */
.btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-cancel {
    background-color: #dc3545;
    margin-left: 10px;
}

/* Styles for the footer */
footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #f8f9fa;
    padding: 10px 0;
    text-align: center;
    border-top: 1px solid #ccc;
}

    </style>
</head>
<body  style="background-image:url('./MYPROJECT/log.jpg'); background-repeat:no-repeat;background-size:cover;">

<div class="container">
    <form action="login.php" method="POST">
        <div class="form-header">
            <h3>LOGIN FORM</h3>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" name="Login" value="Login" class="btn">
            <input type="reset" value="Reset" class="btn btn-cancel">
        </div>
        <div class="form-group">
            <p>Don't have an account? <a href="registration.php">Sign up here</a></p>
        </div>
    </form>
</div>

<footer><!-- Footer section -->
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
</footer><!-- Footer section -->

</body>
</html>
