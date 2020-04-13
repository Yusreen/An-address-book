<!-- This is the second page. Can view,edit,delete, and search data-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Contacts</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<style>
input[type=submit] {
  width: 25%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
<body>
<div class="form">
<p><a href="index.html">Home</a> 
| <h2>View Contacts</h2>
 <p>You  may search either by first or last name</p> 
    <form  method="post" action="search.php"  id="searchform"> 
      <input  type="submit" name="submit" value="Search"> 
    </form> >
<table width="100%" border="2" style="border-collapse:collapse" color= "lightgrey";>
<thead>
<tr>
<th bgcolor="lightgrey"><strong>No.</strong></th>
<th bgcolor="lightgrey"><strong>First Name</strong></th>
<th bgcolor="lightgrey"><strong>Last Name</strong></th>
<th bgcolor="lightgrey"><strong>Phone</strong></th>
<th bgcolor="lightgrey"><strong>Email</strong></th>
<th bgcolor="lightgrey"><strong>Edit</strong></th>
<th bgcolor="lightgrey"><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$con = mysqli_connect("localhost", "root", "", "contact");
// Check connection
if ($con->connect_error) {
die("Connection failed: " . $con->connect_error);
}
$count=1;
$sel_query="Select * from contact;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["f_name"]; ?></td>
<td align="center"><?php echo $row["l_name"]; ?></td>
<td align="center"><?php echo $row["Phone"]; ?></td>
<td align="center"><?php echo $row["Email"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<form action="" method="post">
 <input type="submit" name="ASC" value="Ascending"><br><br>
 <input type="submit" name="DESC" value="Descending"><br><br>
</form>
<?php
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "contact";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

// Ascending Order
if(isset($_POST['ASC']))
{
    $asc_query = "SELECT * FROM contact ORDER BY Email ASC";
    $result = executeQuery($asc_query);
	if($result){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>First name</th>";
                echo "<th>Last ame</th>";
                echo "<th>Email</th>";
				echo "<th>Phone</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['f_name'] . "</td>";
                echo "<td>" . $row['l_name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Phone'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
	
}
}

// Descending Order
else if (isset ($_POST['DESC'])) 
    {
          $desc_query = "SELECT * FROM contact ORDER BY f_name DESC";
          $result = executeQuery($desc_query);
		   if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>First name</th>";
                echo "<th>Last name</th>";
                echo "<th>Email</th>";
				echo "<th>Phone</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['f_name'] . "</td>";
                echo "<td>" . $row['l_name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['Phone'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
    }
    
    // Default Order
 else {
        $default_query = "SELECT * FROM contact";
        $result = executeQuery($default_query);
		if($result){
   
	
}
}


function executeQuery($query)
{
    $connect = mysqli_connect("localhost", "root", "", "contact");
    $result = mysqli_query($connect, $query);
    return $result;
}
?>
</body>
</html>
