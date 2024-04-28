<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
            background-image: url('assets/dashboardimgblur.png');   
            background-size: cover; 
        }
        .container { 
            padding: 50px; 
        }
        .page-header h1 { 
            margin-bottom: 20px;
            font-size: 36px; /* Increase font size */
            color: #fff; /* Change font color to white */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow */
        }
        .btn { 
            margin-top: 10px; 
        }

        /* Additional CSS for card-like appearance */
        .card-row {
            display: flex;
            justify-content: center;
            gap: 20px; /* Add gap between columns */
        }

        .card-col {
            margin-bottom: 20px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            color: inherit; /* Restoring the link color */
            padding: 20px; /* Increasing the padding to increase card height */
            background-color: #f8f9fa; /* Change background color */
            border: 1px solid #dee2e6; /* Add border */
        }

        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Welcome to Pharmacy Store</h1>
        </div>
        <div class="row card-row">
            <div class="col-md-4 card-col">
                <a href="stock.php" class="btn btn-primary btn-lg btn-block card">Stock</a>
            </div>
            <div class="col-md-4 card-col">
                <a href="management.php" class="btn btn-success btn-lg btn-block card">Management</a>
            </div>
            <div class="col-md-6 card-col">
                <a href="customer.php" class="btn btn-info btn-lg btn-block card">Customers</a>
            </div>
        </div>
        <div class="row card-row">
            <div class="col-md-6 card-col">
                <a href="prescriptions.php" class="btn btn-warning btn-lg btn-block card">Prescriptions</a>
            </div>
            <div class="col-md-6 card-col">
                <a href="receipts.php" class="btn btn-danger btn-lg btn-block card">View Receipts</a>
            </div>
        </div>
        <div class="row card-row mt-4">
            <div class="col-md-12 card-col">
                <div class="row">
                    <div class="col-md-6">
                        <a href="reset.php" class="btn btn-secondary btn-lg btn-block card">Reset Your Password</a>
                    </div>
                    <div class="col-md-6">
                        <a href="logout.php" class="btn btn-dark btn-lg btn-block card">Sign Out of Your Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
