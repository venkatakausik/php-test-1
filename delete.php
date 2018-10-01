<?php
include 'connect.php';
$delete_id=$_GET['del'];
$sql = "DELETE FROM details WHERE email='$delete_id'";

if (mysqli_query($con, $sql)) {
    echo "<body style='background-color:black;'><br><div align='center' style='color:white; font-size:20px;'>Record deleted successfully</div></body>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
?>