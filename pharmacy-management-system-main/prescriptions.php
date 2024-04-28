<?php
include 'customer.php';
require_once "config.php";

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRESCRIPTIONS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        /* Your CSS Styles */
        .hidden-element {
            display: none; /* Hide other elements by default */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1></h1>
        </div>
        <?php
        // Establish connection
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        // Check connection
        if ($link === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM prescription_detail"; 
        $result = mysqli_query($link, $sql);
        
        if ($result) { 
            if (mysqli_num_rows($result) > 0) { 
                // echo "<table class='table'>"; 
                // echo "<tr>"; 
                // echo "<th>PRESCRIPTION ID</th>"; 
                // echo "<th>DRUG NAME</th>"; 
                // echo "<th>CONDITION</th>"; 
                // echo "<th>DOSE</th>"; 
                // echo "<th>QUANTITY</th>"; 
                // echo "<th>DOCTOR NAME</th>"; 
                // echo "</tr   >"; 
           
                echo "</table>"; 
            } 
            else { 
                echo "No matching records are found."; 
            } 
            mysqli_free_result($result); // Free result set
        } 
        else { 
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
        } 
        
        // Close connection
        mysqli_close($link);
        ?>
    </div>
    
    <!-- Hide other content here -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide other elements with class 'hidden-element'
            var elementsToHide = document.querySelectorAll(".hidden-element");
            elementsToHide.forEach(function(element) {
                element.style.display = "none";
            });
        });
    </script>
</body>
</html>
