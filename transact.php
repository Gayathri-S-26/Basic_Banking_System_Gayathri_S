<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Basic Banking system</title>
   <link rel="icon" type="image/jpg" href="bank.jpg" sizes="16x16">
<style>

body{
background-color: indigo;
color:white;
}

h1{
text-align: center;
color: red;
letter-spacing: .1em;
text-shadow: 0 -1px 0 #fff, 0 1px 0 #2e2e2e, 0 2px 0 #2c2c2c, 0 3px 0 #2a2a2a, 0 4px 0 #282828, 0 5px 0 #262626, 0 6px 0 #242424, 0 7px 0 #222, 0 8px 0 #202020, 0 9px 0 #1e1e1e, 0 10px 0 #1c1c1c, 0 11px 0 #1a1a1a, 0 12px 0 #181818, 0 13px 0 #161616, 0 14px 0 #141414, 0 15px 0 #121212, 0 22px 30px rgba(0, 0, 0, 0.9);
}


ul {
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

fieldset{
	margin-top: 10%;
	background-color: maroon;
}

input[type='submit']{
color: rgb(255, 254, 253); font-size: 15px; line-height: 15px; padding: 8px; border-radius: 7px; font-family: Georgia, serif; font-weight: normal; text-decoration: none; font-style: normal; font-variant: normal; text-transform: none; border: 2px solid rgb(28, 110, 164); display: inline-block;background-color: #008080;
}

input[type='submit']:hover {
background: black; }

input[type='submit']:active {
background: #008080; }

.success{
	color:gold;
    text-align: center;
}

</style>
</head>
<body>

<?php

    $host='localhost';
    $username='root';
    $password='';
    $dbname='sparks';

 $con=mysqli_connect($host,$username,$password,$dbname);
 
/* Get the depositer's name and account no */

 $na = $_GET['na'];
 $ac = $_GET['ac'];


?>

<!-- Navigation Bar -->

<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="customers.php">Customers</a></li>
  <li><a href="history.php">Transaction History</a></li>
  <li><a href="https://internship.thesparksfoundation.info/">About us</a></li>
 </ul> 
 
<!-- Get the Receiver's Name and Account_No and amount to be transferred -->
 
<form method="post">
   <fieldset>
     <table align="center">
      <tr>
      <td>Enter the Depositor's Name:</td>
      <td><input type="text" value="<?php echo "$na" ?>" id="names"></td>
      </tr>

      <tr>
      <td>Enter the Depositor's Account Number:</td>
      <td><input type="number" value="<?php echo "$ac" ?>"></td>
      </tr>

      <tr>
      <td><label for="Receivername">Enter the Receiver's Name:</label></td>
      <td><select id="Receivername" name="Receivername">
           <option value=""></option>
           <option value="">ABINAYA</option>
           <option value="">BHAVANI</option>
           <option value="">JOSEPH</option>
           <option value="">KALAI</option>
           <option value="">KARTHIK</option>
           <option value="">KUMARAN</option>
           <option value="">MANJU</option>
           <option value="">RAGAVAN</option>
           <option value="">SUBHA</option>
           <option value="">VELU</option>
          </select>
      </td>
      </tr>

      <tr>
      <td><label for="account_no">Enter the Receiver's Account Number:</label></td>
      <td><select id="account_no" name="account_no">
           <option value=""></option>
           <option value="10001001">10001001</option>
           <option value="10001732">10001732</option>
           <option value="10001245">10001245</option>
           <option value="10001110">10001110</option>
           <option value="10001234">10001234</option>
           <option value="10001111">10001111</option>
           <option value="10001257">10001257</option>
           <option value="10002333">10002333</option>
           <option value="10001664">10001664</option>
           <option value="10002867">10002867</option>
          </select>
      </td>
      </tr>

      <tr>
      <td>Enter the Amount:</td>
      <td><input type="number" value="" name="amount" id="amount"></td>
      </tr>

      <tr>
      <td align="center" id="submit"><input type="submit"></td>
      </tr>
     </table>
   </fieldset>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{   

    $account_no=($_POST["account_no"]);
    $amount=($_POST["amount"]);
    
/* Get the date for Transaction history */
    
    $date=date("Y-m-d H:i:s");
    $date = date('Y-m-d H:i:s', strtotime('+5 hours 30 minutes', strtotime($date)));
    
/* Update the Depositor's and Receiver's Balance and Last transaction date */
    
    $query="UPDATE CUSTOMERS SET BALANCE=BALANCE-'$amount' WHERE NAME='$na'";
    $query2="UPDATE CUSTOMERS SET TRANSACT_DATE='$date' WHERE NAME='$na'";
    $query3="UPDATE CUSTOMERS SET TRANSACT_DATE='$date' WHERE ACCOUNT_NO='$account_no'";
    $query1="UPDATE CUSTOMERS SET BALANCE=BALANCE+'$amount' WHERE ACCOUNT_NO='$account_no'";
    $res1=mysqli_query($con,$query);
    $res2=mysqli_query($con,$query1);
    $res3=mysqli_query($con,$query2);
    $res4=mysqli_query($con,$query3);
 
    if($res2){
    	echo "<h1 align='center' class='success'>!!!TRANSACTION SUCCESSFUL!!!</h1>";
    }

}


?>

</body>
</html>

