<?php
include "connection.php";
$id=$_GET['update_id'];
$query = mysqli_query($conn,"UPDATE customer_registration  SET  approval_status=1 WHERE customer_id=$id"); 
if($query)
{
    ?>
   <script> window.location.assign('admin_customer_view.php');</script>
<?php
    echo'<script>alert("approved");</script>';
}

?>