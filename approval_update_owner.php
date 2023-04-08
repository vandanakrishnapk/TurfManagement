<?php
include "connection.php";
$id = $_GET['update_id2'];
$query1 = mysqli_query($conn,"UPDATE owner_registration SET approval_status=1 WHERE owner_id=$id");
if($query1)
{
    ?>
<script>window.location.assign('admin_owner_view');</script>
<?php 
echo'<script>alert("approved");</script>';
}
?>