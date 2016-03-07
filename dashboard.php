<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="stylesheet.css" rel="stylesheet"/>
<link rel="shortcut icon" href="MagicWandIconTrans.png">
</head>
<body>

<?php
include "connectDB.php";
session_start();
if($_SESSION['loggedIn'] == 0)
{
?>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="mission.php">Mission</a></li>
  <li><a href="contact.php">Contact</a></li>
  <ul style="float:right;list-style-type:none;">
     <?php include "logoutMenu.php"; ?> 
  </ul>
</ul>
<?php
echo "<center><br><br>Please <a href='login.php'>login</a> or <a href='createAccount.php'>create an account</a></center>";
}
else
{
?>
<ul>
  <li><a href="lights.php">Lights</a></li>
  <li><a href="report.php">Energy Report</a></li>
  <li><a href="manageDevices.php">Manage Devices</a></li>
  <ul style="float:right;list-style-type:none;">
     <?php include "logoutMenu.php"; ?> 
  </ul>
</ul>

<center>
	<?php
	   echo "<br/><h1>Welcome " . $_SESSION['username'] . "</h1><br/>";
	   $managerinfo = mysql_query("SELECT * FROM manager WHERE managerID = '".$_SESSION['username']."'") or die(mysql_error());
	   $row = mysql_fetch_array($managerinfo);
	   echo "Your Store: " . $row['storeID'];
	   echo "<br/>Your Email: " . $row['email'];
	?>
</center>

<?php
}
?>
</body>
</html>
