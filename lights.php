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
echo "<center><br><br>Please <a href='login.php'>login</a> or <a href='createAccount'>create an account</a></center>";
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
	   $storeinfo = mysql_query("SELECT * FROM store WHERE storeID = '".$row['storeID']."'") or die(mysql_error());
           $row = mysql_fetch_array($storeinfo);
	   echo "Store Name: " . $row['storeID'];
	   echo "<br/>Primary Lights Status: ";
	   if ($row['primaryLightStatus'] == 1)
		{
             	   echo "On<br/><br/>";
		   echo '<form action="lights.php" method="get">';
		   echo '<input type="submit" name="Off" value="Turn Off" />';
		   echo	'</form>';
		}
	   else
		{
	     	   echo "Off<br/><br/>";
		   echo	'<form action="lights.php" method="get">';
		   echo	'<input type="submit" name="On" value="Turn On" />';
		   echo	'</form>';
		}
        ?>
</center>

<?php
}

    if(isset($_GET['On'])) {
        $turnlightson = mysql_query("UPDATE store SET primaryLightStatus=1 WHERE storeID = '".$row['storeID']."'") or die(mysql_error());
	header("Refresh:0; url=http://54.84.99.231/lights.php");
    }
    elseif(isset($_GET['Off'])) {
        $turnlightson = mysql_query("UPDATE store SET primaryLightStatus=0 WHERE storeID = '".$row['storeID']."'") or die(mysql_error());
	header("Refresh:0; url=http://54.84.99.231/lights.php");
    }
?>
</body>
</html>

