<?php
require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: #f8f9fa; 
        }
        .container {
            padding: 50px;
        }
        .page-header h1 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }
        .btn-container {
            margin-top: 20px;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Receipts</h1>
        </div>
        <?php
        $sql = "SELECT * FROM receipts"; 
        if ($res = mysqli_query($link, $sql)) { 
            if (mysqli_num_rows($res) > 0) { 
                echo "<table>"; 
                echo "<tr>"; 
                echo "<th>Receipt No</th>"; 
                echo "<th>Prescription ID</th>"; 
                echo "<th>Drug</th>"; 
                echo "<th>Quantity</th>"; 
                echo "<th>Total</th>"; 
                echo "<th>Date</th>";
                echo "<th>Doctor Name</th>";
                echo "</tr>"; 
                while ($row = mysqli_fetch_array($res)) { 
                    echo "<tr>"; 
                    echo "<td>".$row['r_no']."</td>"; 
                    echo "<td>".$row['pres_id']."</td>"; 
                    echo "<td>".$row['drug']."</td>"; 
                    echo "<td>".$row['quantity']."</td>"; 
                    echo "<td>".$row['total']."</td>"; 
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['doctor_name']."</td>";  
                    echo "</tr>"; 
                } 
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
        <div class="btn-container">
            <a href="welcome.php" class="btn btn-danger">Go Back</a>
        </div>
    </div>
</body>
</html>
