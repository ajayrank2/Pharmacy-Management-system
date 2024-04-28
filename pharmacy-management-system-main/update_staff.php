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
$staff_id="";
$FirstName="";
$LastName="";
$Designation="";
$Phone_no="";
$date_joined="";
$salary="";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>add/remove staff</title>
<link rel="stylesheet" href="css/style1.css" />
<script>
function validateForm() {
  var staff_id = document.forms["staffForm"]["staff_id"].value;
  var FirstName = document.forms["staffForm"]["FirstName"].value;
  var LastName = document.forms["staffForm"]["LastName"].value;
  var Designation = document.forms["staffForm"]["Designation"].value;
  var Phone_no = document.forms["staffForm"]["Phone_no"].value;
  var date_joined = document.forms["staffForm"]["date_joined"].value;
  var salary = document.forms["staffForm"]["salary"].value;
  
  if (staff_id == "") {
    alert("Staff ID must be filled out");
    return false;
  }
  if (FirstName == "") {
    alert("First Name must be filled out");
    return false;
  }
  if (LastName == "") {
    alert("Last Name must be filled out");
    return false;
  }
  if (Designation == "") {
    alert("Designation must be filled out");
    return false;
  }
  if (Phone_no == "") {
    alert("Phone Number must be filled out");
    return false;
  }
  if (date_joined == "") {
    alert("Date Joined must be filled out");
    return false;
  }
  if (salary == "") {
    alert("Salary must be filled out");
    return false;
  }
}
</script>
</head>
<body>
    <div id="wrapper">
        <center><h2>ADD/UPDATE/REMOVE STAFF!</h2></center>
<div class="container">
    <?php
        if(isset($_POST['fetch_btn'])){
            $staff_id = $_POST['staff_id'];
            if($staff_id=="")
            {
                echo '<script type="text/javascript">alert("Enter staff ID to get staff details")</script>';
            }
            {
                $query="select * from management where staff_id='$staff_id' ";
                $query_run=mysqli_query($link,$query);
                if($query_run)
                {
                    if(mysqli_num_rows($query_run)>0)
                    {
                        $row= mysqli_fetch_array($query_run,MYSQLI_ASSOC);
                        $staff_id=$row['staff_id'];
                        $FirstName=$row['FirstName'];
                        $LastName=$row['LastName'];
                        $Designation=$row['Designation'];
                        $Phone_no=$row['Phone_no'];
                        $date_joined=$row['date_joined'];
                        $salary=$row['salary'];
                
                    }
                    else{
                        echo '<script type="text/javascript">alert("Invalid staff ID")</script>';
                    }
                }
                else{
                    echo '<script type="text/javascript">alert("Error in query")</script>';
                }
                
            }
            
        }
        
    ?>    
            <form name="staffForm" action="update_staff.php" method="post" onsubmit="return validateForm()">
                <label><b>Staff ID</b> </label><button id="btn_go" name="fetch_btn" type="submit">GO</button>
                <input type="text" placeholder="Enter the staff ID" name="staff_id" value="<?php echo $staff_id; ?>">
                <label><b>First Name</b></label>
                <input type="text" placeholder="Enter the First name" name="FirstName" value="<?php echo $FirstName; ?>">
                <label><b>Last Name</b></label>
                <input type="text" placeholder="Enter the last name" name="LastName" value="<?php echo $LastName; ?>">
                <label><b>Designation</b></label>
                <input type="text" placeholder="Enter the Designation" name="Designation" value="<?php echo $Designation; ?>">
                <label><b>Phone Number</b></label>
                <input type="number" placeholder="Enter the phone no" name="Phone_no" value="<?php echo $Phone_no; ?>">
                <label><b>Date Joined</b></label>
                <input type="date" placeholder="Enter the date joined" name="date_joined" value="<?php echo $date_joined; ?>">
                <label><b>Salary</b></label>
                <input type="number" placeholder="Enter the salary" name="salary" value="<?php echo $salary; ?>">
                
                <center>
                    <button id="btn_add" name="add_btn" type="submit">Add</button>
                    <button id="btn_update" name="update_btn" type="submit">Update</button>
                    <button id="btn_remove" name="remove_btn" type="submit">Remove</button>
                    <a href="management.php" class="btn btn-danger">GO BACK</a>
                </center>
            </form>
            <?php
            if(isset($_POST['add_btn'])){
                $staff_id=$_POST['staff_id'];
                $FirstName=$_POST['FirstName'];
                $LastName=$_POST['LastName'];
                $Designation=$_POST['Designation'];
                $Phone_no=$_POST['Phone_no'];
                $date_joined=$_POST['date_joined'];
                $salary=$_POST['salary'];
                
                if($staff_id=="" || $FirstName=="" || $LastName=="" || $Designation=="" || $Phone_no=="" || $date_joined=="" || $salary=="")
                {
                    echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                }
                else{
                    $query = "insert into management (staff_id, FirstName, LastName, Designation, Phone_no) values ('$staff_id','$FirstName','$LastName','$Designation', '$Phone_no')";
                    $query_run=mysqli_query($link,$query);
                    if($query_run)
                    {
                        echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
                    }
                    else{
                        echo '<script type="text/javascript">alert("Values not inserted successfully")</script>';
                        
                    }
                    
            
                }
            }
            else if(isset($_POST['update_btn']))
            {
                if($_POST['staff_id']=="" || $_POST['FirstName']=="" || $_POST['LastName']=="" || $_POST['Designation']=="" || $_POST['Phone_no']=="" || $_POST['date_joined']=="" || $_POST['salary']=="")
                {
                    echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                }
                else{
                    $staff_id=$_POST['staff_id'];
                    $FirstName=$_POST['FirstName'];
                    $LastName=$_POST['LastName'];
                    $Designation=$_POST['Designation'];
                    $Phone_no=$_POST['Phone_no'];
                    $date_joined=$_POST['date_joined'];
                    $salary=$_POST['salary'];
                    
                    $query = "update management
                        SET FirstName='$FirstName', LastName='$LastName', Designation='$Designation', Phone_no='$Phone_no'
                        WHERE staff_id='$staff_id' ";
                        
                        $query_run = mysqli_query($link,$query);
                        
                            if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Staff updated successfully")</script>';
                            }
                            else{
                                echo '<script type="text/javascript">alert("Error")</script>';
                            }
                        
                    
                }
            }
            else if(isset($_POST['remove_btn']))
            {
                if($_POST['staff_id']=="")
                {
                    echo '<script type="text/javascript">alert("Enter staff ID to remove")</script>';
                }
            else{
                    $staff_id = $_POST['staff_id'];
                    
                    $query = "delete from management
                        WHERE staff_id='$staff_id' ";
                        $query_run = mysqli_query($link,$query);
                        if($query_run)
                            {
                                echo '<script type="text/javascript">alert("Staff removed")</script>';
                            }
                            else{
                                echo '<script type="text/javascript">alert("Error")</script>';
                            }
                    
                }
            }
            

        ?>    

        </div>
    </div>

</body>
</html>
