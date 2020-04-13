<?php
$con = mysqli_connect("localhost", "root", "", "contact");
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$id=$_REQUEST['id'];
$query = "DELETE FROM contact WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: contacts.php"); 
?>