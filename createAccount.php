<?php include "connectDB.php"; ?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="stylesheet.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css.map" rel="stylesheet">
<link rel="shortcut icon" href="img/MagicWandIconTrans.png">
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="mission.php">Mission</a></li>
  <li><a href="contact.php">Contact</a></li>
  <ul style="float:right;list-style-type:none;">
    <li><a class="active" href="createAccount.php">Create Account</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</ul>

<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $email = mysql_real_escape_string($_POST['email']);
    $storeid = mysql_real_escape_string($_POST['storeid']);
     
     $checkusername = mysql_query("SELECT * FROM manager WHERE managerID = '".$username."'");
     $checkstoreid = mysql_query("SELECT * FROM store WHERE storeID = '".$storeid."'");

     if(mysql_num_rows($checkusername) == 1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that manager ID is taken. Please go back and try again.</p>";
     }
     elseif (mysql_num_rows($checkstoreid) == 0)
     {
	echo "<h1>Error</h1>";
        echo "<p>That store ID does not exist. Please go back and try again.</p>";
     }
     //new code, validates email address
     elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
     {
	 echo "<h1>Error</h1>";
         echo "<p>That email address is not valid. Please go back and try again.</p>";
     }
     //end new code
     else
     {
        $registerquery = mysql_query("INSERT INTO manager (managerID, storeID, managerPassword, email) VALUES('".$username."', '".$storeid."', '".$password."', '".$email."')");
	$updatestoremanager = mysql_query("UPDATE store SET managerID = '".$username."' WHERE storeID = '".$storeid."'");
	if($registerquery && $updatestoremanager)
        {
	    echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created.  Please <a href=\"login.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";
	    die("MySQL Error: " . mysql_error());
        }       
     }
}
else
{
    ?>
     
   <h1>Register</h1>
     
   <p>Please enter your details below to register.</p>
     
    <form method="post" action="createAccount.php" name="registerform" id="registerform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
	<label for="storeid">Store ID:</label><select name="Store">
  		<?php
		$checkstorenames = mysql_query("SELECT storeID FROM store") or die(mysql_error());
		while($row = mysql_fetch_array($checkstorenames)){
		echo "<option value=".$row["storeID"].">".$row["storeID"]."</option>";
		}
		?>
	</select><br />
        <input type="submit" name="register" id="register" value="Register" />
    </fieldset>
    </form>
     
    <?php
}
?>


</body>
</html>
