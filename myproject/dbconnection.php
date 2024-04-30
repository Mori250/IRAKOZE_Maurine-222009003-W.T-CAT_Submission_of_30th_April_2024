<?php
        // Establish database connection
        include('dbconnection.php');
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
   ?>     