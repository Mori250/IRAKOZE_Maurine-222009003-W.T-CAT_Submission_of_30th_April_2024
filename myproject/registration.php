<!DOCTYPE html>
<html lang="en">
<head>
    <!-- official website designed by G8 on 24th march 2024-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registration Form</title>
</head>
<body>


<div class="container">
    <h3 class="text-center mt-5 mb-4"><i>REGISTRATION FORM</i></h3>
    <form action="user_table.php" method="POST">
        <div class="form-group row">
            <label for="user_id" class="col-sm-2 col-form-label">User_id</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="user_id" name="user_id">
            </div>
        </div>
        <div class="form-group row">
            <label for="names" class="col-sm-2 col-form-label">Names</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="names" name="names">
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <button type="submit" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </form>
</div>

<footer class="bg-light text-center py-3">
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p>
</footer>

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>