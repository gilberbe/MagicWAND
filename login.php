<?php include "connectDB.php"; ?>
<!DOCTYPE html>
<html>  
<head>
<link type="text/css" href="stylesheet.css" rel="stylesheet"/>
<link href="css/bootstrap.min.css.map" rel="stylesheet">
<link rel="shortcut icon" href="img/MagicWandIconTrans.png">
<title>Magic WAND Login</title>
</head>  
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="mission.php">Mission</a></li>
  <li><a href="contact.php">Contact</a></li>
  <ul style="float:right;list-style-type:none;">
    <?php include "logoutMenu.php"; ?> 
 </ul>
</ul>
  
<?php
if(!empty($_SESSION['loggedIn']) && !empty($_SESSION['username']))
{
	echo "<meta http-equiv='refresh' content='0;control.php' />";
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
     
    $checklogin = mysql_query("SELECT * FROM manager WHERE managerID = '".$username."' AND managerPassword = '".$password."'");
     
    if(mysql_num_rows($checklogin) == 1)
    {
        $row = mysql_fetch_array($checklogin);
        $email = $row['email'];
         
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['loggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='0;dashboard.php' />";
    }
    else
    {
        echo "<h1>Incorrect Username Or Password</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"login.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>
     
   <h1>Member Login</h1>
     
   <p>Thanks for visiting! Please either login below, or <a href="createAccount.php">click here to register</a>.</p>
     
    <form method="post" action="login.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Manager ID:</label><input type="text" name="username" id="username" /><br />
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <input type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>
     
   <?php
}
?>
 
</div>
</body>
</html>
