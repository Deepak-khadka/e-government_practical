<?php
require('connection.php');
$scno = $_POST['scno'];
$cuid = $_POST['cuid'];
$fname = $_POST['fname'];
$mdate = $_POST['mdate'];
$pre_reading = $_POST['pre_reading'];
$current_reading = $_POST['current_reading'];
$unit_consumed = $_POST['unit_consumed'];
$demand_type = $_POST['demand_type'];
$bill_amount = $_POST['bill_amount'];
$fy = $_POST['fy'];
$months = $_POST['months'];

$sql = "INSERT INTO bill_info(scno, cuid,fname,mdate,pre_reading,current_reading,unit_consumed,demand_type,bill_amount,fy,months) 
VALUE ('$scno','$cuid','$fname','$mdate','$pre_reading','$current_reading','$unit_consumed','$demand_type','$bill_amount','$fy','$months')";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

echo "Thank you ";
?>

<a href="index.php">Click here to go back</a>
