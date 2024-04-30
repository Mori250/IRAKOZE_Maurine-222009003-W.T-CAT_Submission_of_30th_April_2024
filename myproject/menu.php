<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="./css/style.css" title="style1" media="screen,tv,print,handheld"/>
		<title>Farm management system</title>
		<style>
			/* Reset default browser styles */
body, h1, h2, h3, h4, h5, h6, p, ul, li {
    margin: 0;
    padding: 0;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    line-height: 1.6;
}

.container {
    width: 80%;
    margin: 0 auto;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

nav ul li a:hover {
    color: #ffd700; /* Change to desired hover color */
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

#home {
    text-align: center;
    padding: 50px 0;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}

/* Additional styles */
h1 {
    font-size: 36px;
}

h2 {
    font-size: 28px;
}

h3 {
    font-size: 24px;
}

h4 {
    font-size: 20px;
}

h5 {
    font-size: 18px;
}

h6 {
    font-size: 16px;
}

p {
    margin-bottom: 20px;
}

center {
    text-align: center;
}

marquee {
    color: #008000; /* Change to desired color */
}

		</style>
	</head>
	<!-- this is body of my project -->
	<body>
	<header>
		<nav>
			<ul>
			<!-- Navigation links -->
				<li><a href="home.html">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				<li><a href="services.php">Our Services</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li class="dropdown"><!-- Dropdown menu --> <a href="#">Forms</a>
				 <div class="dropdown-content">
				    <a href="user_form.html">User Form</a>
				    <a href="agronomist-form.html">Agronomist Form</a>
				    <a href="manager-form.html">Manager Form</a>
				    <a href="buyers form.html">Buyers Form</a>
				    <a href="production form.html">Production Form</a>
				    <a href="purchase form.html">Purchase Form</a>
				    <a href="sales form.html">Sales Form</a>
				    <a href="product form.html">Product Form</a>
				    <a href="farmers form.html">Farmers Farm</a>
				    



				  </div>
			  </li>
			  	<li class="dropdown"><!-- Dropdown menu --> <a href="#">Table</a>
				 <div class="dropdown-content">
				    <a href="user_table.php">User Table</a>
				    <a href="agronomist.php">Agronomist Table</a>
				    <a href="manager table.php">Manager Table</a>
				    <a href="Buyers-table.php">Buyers Table</a>
				    <a href="production-table.php">Production Table</a>
				    <a href="purchase-table.php">Purchase Table</a>
				    <a href="sales-table.php">Sales Table</a>
				    <a href="products-table.php">Product Table</a>
				    <a href="farmers-table.php">Farmers Table</a>
				    
				  </div>
			  </li>
				<li class="dropdown"><!-- Dropdown menu --> <a href="#">Setting</a>
				 <div class="dropdown-content">
				    <a href="Registration2.php">Register</a>
				    <a href="logout.php">Logout</a>	
				  </div>
			  </li>
			</ul>
		</nav>
	</header>