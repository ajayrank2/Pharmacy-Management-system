<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insertion/Deletion of Stock</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font: 14px sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            margin-top: 20px;
        }
        form {
            background-color: #fff; /* White background for form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); /* Shadow effect */
        }
        label {
            font-weight: bold;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php  $stock_id = $drug_name = $date_supplied = $description = $supplier = $quantity = $cost = $availability = ''; ?>
    <div class="container">
        <center><h2>INSERT/UPDATE/DELETE STOCK!</h2></center>
        <div class="inner_container">
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="stock_id">Stock ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="stock_id" placeholder="Enter Stock ID" name="stock_id" value="<?php echo $stock_id; ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit" name="fetch_btn">GO</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="drug_name">Drug Name</label>
                    <input type="text" class="form-control" id="drug_name" placeholder="Enter Drug Name" name="drug_name" value="<?php echo $drug_name; ?>">
                </div>
                <div class="form-group">
                    <label for="date_supplied">Date Supplied</label>
                    <input type="date" class="form-control" id="date_supplied" name="date_supplied" value="<?php echo $date_supplied; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter Description" name="description" value="<?php echo $description; ?>">
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <input type="text" class="form-control" id="supplier" placeholder="Enter Supplier" name="supplier" value="<?php echo $supplier; ?>">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" placeholder="Enter Quantity" name="quantity" value="<?php echo $quantity; ?>">
                </div>
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" class="form-control" id="cost" placeholder="Enter Cost" name="cost" value="<?php echo $cost; ?>">
                </div>
                <div class="form-group">
                    <label for="availability">Availability</label>
                    <input type="text" class="form-control" id="availability" placeholder="Enter Availability" name="availability" value="<?php echo $availability; ?>">
                </div>
                <center>
                    <button type="submit" class="btn btn-success" name="insert_btn">Insert</button>
                    <button type="submit" class="btn btn-warning" name="update_btn">Update</button>
                    <button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
                </center>
            </form>
            <div class="btn-container">
                <a href="stock.php" class="btn btn-danger">GO BACK</a>
            </div>
        </div>
    </div>
</body>
</html>
