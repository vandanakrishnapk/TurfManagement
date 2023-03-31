<?php
$conn = mysqli_connect("localhost","root","","turf_booking");
if(mysqli_connect_errno())
{
die('error in connection');
}
$customer_id = $_POST['customer_id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$place = $_POST['place'];
$email = $_POST['email'];
$query = mysqli_query($conn,"INSERT INTO cust_reg(name,mobile,place,email) VALUES('$name','$mobile','$place','$email')");
if($query)
{
    $myarray['message'] = 'Added';
}
else
{
    $myarray['message'] = 'failed';
}
echo json_encode($myarray);
?>