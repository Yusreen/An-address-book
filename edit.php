<?php
$con = mysqli_connect("localhost", "root", "", "contact");
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$id=$_REQUEST['id'];
$query = "SELECT * from contact where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Contact</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="contacts.php">Back</a> 
| <a href="index.html">Insert New Conatct</a> 
<h1>Contact</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$f_name =$_REQUEST['fname'];
$l_name =$_REQUEST['lname'];
$Email =$_REQUEST['email'];
$Phone =$_REQUEST['phone'];
$update="update contact set f_name='".$f_name."', l_name='".$l_name."',Email='".$Email."',Phone='".$Phone."'where id='".$id."'";
mysqli_query($con, $update);
$status = "Contact Updated Successfully. </br></br>
<a href='contacts.php'>View Updated Contact</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />First Name
<p><input type="text" name="fname" placeholder="Enter First name" 
required value="<?php echo $row['f_name'];?>" /></p>Last Name
<p><input type="text" name="lname" placeholder="Enter last name" 
required value="<?php echo $row['l_name'];?>" /></p>Email

<p><input type="email" name="email" placeholder="Enter email" 
required value="<?php echo $row['Email'];?>" /></p>Phone
<p><input type="phone" name="phone" placeholder="Enter Phone number" 
required value="<?php echo $row['Phone'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
