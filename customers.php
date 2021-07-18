<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Basic Banking system</title>
   <link rel="icon" type="image/jpg" href="bank.jpg" sizes="16x16">
<style>

body{
background-image: url('custom.gif');
background-size: cover;
background-repeat: no-repeat;
background-color: indigo;
color:white;
}

h1{
text-align: center;
color: red;
letter-spacing: .1em;
text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 0 5px 0 #262626, 0 6px 0 #242424, 0 7px 0 #222, 0 8px 0 #202020, 0 9px 0 #1e1e1e, 0 10px 0 #1c1c1c, 0 11px 0 #1a1a1a, 0 12px 0 #181818, 0 13px 0 #161616, 0 14px 0 #141414, 0 15px 0 #121212, 0 22px 30px rgba(0, 0, 0, 0.9);
}

table{
   border: 1px solid black;
}

th,td{
    padding: 10px;
}

tr:nth-child(odd){
	background-color: maroon;
}

tr:nth-child(even){
	background-color: green;
}

ul{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #008080;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

</style>
</head>

<body>
  
<!-- Navigation Bar -->    
    
<ul>
 	  <li><a href="index.html">Home</a></li>
    <li><a href="customers.php">Customers</a></li>
    <li><a href="history.php">Transaction History</a></li>
    <li><a href="https://internship.thesparksfoundation.info/">About us</a></li>
 </ul>

  <h1>CUSTOMERS LIST</h1><br>
	
<?php

	  $host='localhost';
    $username='root';
    $password='';
    $dbname='sparks';

    $con=mysqli_connect($host,$username,$password,$dbname);

/* Displaying the customers */

$sql="SELECT * FROM CUSTOMERS ORDER BY NAME ASC";
$res=mysqli_query($con,$sql);
echo "<table border='1' align='center'>
<th>Name</th>
<th>Account_No</th>
<th>Email</th>
<th>Phone</th>
<th>Balance</th>";

while($row=mysqli_fetch_array($res))
{

echo"<tr>";
echo"<td>".$row[0]."</td>";
echo"<td>".$row[1]."</td>";
echo"<td>".$row[2]."</td>";
echo"<td>".$row[3]."</td>";
echo"<td>".$row[4]."</td>";
echo"</tr>";
}

echo"</table>";
mysqli_close($con);

?>
</body>
</html>

