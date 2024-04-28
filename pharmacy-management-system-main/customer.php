<?php
// Include config file
require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$sql = "SELECT * FROM prescription"; 
if ($res = mysqli_query($link, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table class='table table-striped table-bordered'>"; 
        echo "<thead class='thead-dark'>"; 
        echo "<tr>"; 
        echo "<th>PRESCRIPTION-ID</th>"; 
        echo "<th>CUSTOMER NAME</th>"; 
        echo "<th>AGE</th>"; 
        echo "<th>SEX</th>"; 
        echo "<th>ADDRESS</th>"; 
        echo "<th>PHONE NO</th>"; 
        echo "<th>DATE</th>"; 
        echo "</tr>"; 
        echo "</thead>"; 
        echo "<tbody>"; 
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['pres_id']."</td>"; 
            echo "<td>".$row['cust_name']."</td>"; 
            echo "<td>".$row['Age']."</td>"; 
            echo "<td>".$row['sex']."</td>"; 
            echo "<td>".$row['address']."</td>"; 
            echo "<td>".$row['Phone']."</td>"; 
            echo "<td>".$row['date']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</tbody>"; 
        echo "</table>"; 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 
mysqli_close($link); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CUSTOMER LIST</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .table { border-collapse: collapse; width: 100%; }
        .table th, .table td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        .table th { background-color: #4CAF50; color: white; }
        .table tbody tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <p>
        <a href="welcome.php" class="btn btn-danger">GO BACK</a>
    </p>
</body>
</html>
