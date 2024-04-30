<?php include "menu.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body{
            background-color:lightgreen;
        }
        .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

#contact-info ul {
    list-style: none;
    padding: 0;
}

#contact-info ul li {
    margin-bottom: 10px;
}

#contact-form form {
    max-width: 600px;
}

#contact-form form .form-label {
    margin-bottom: 5px;
}

#contact-form form .form-control {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#contact-form form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#contact-form form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#contact-form form button:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>

    <section id="contact-info" class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions or inquiries, feel free to reach out to us through any of the following means:</p>
        <ul>
            <li>Email: farmmanagement@gmail.com</li>
            <li>Phone: +250788889970</li>
            <li>Address: KK 509 Main Street, Kigali, Rwanda</li>
        </ul>
    </section>

    <section id="contact-form" class="container mt-4">
        <h2>Send us a message</h2>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </section>

    <footer class="container mt-4"><!-- Footer section -->
        <p>&copy &reg 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
    </footer><!-- Footer section -->

</body>

</html>
