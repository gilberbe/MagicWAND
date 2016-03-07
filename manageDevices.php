<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="stylesheet.css" rel="stylesheet"/>
<link rel="shortcut icon" href="MagicWandIconTrans.png">
</head>
<body>

<?php
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
  <li><a href="control.php">Manage Devices</a></li>
  <ul style="float:right;list-style-type:none;">
     <?php include "logoutMenu.php"; ?> 
  </ul>
</ul>

<center>
        <?php
           echo "welcome " . $_SESSION['username'];
        ?>
        <p>This is where the user will add devices to be controlled</p>
</center>

<?php
}
?>
</body>
</html>
